<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\StallTypes;
use App\Models\StallNumber;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        // Makuha tanan transactions
        $transactions = Transaction::all();

        // Ipasa ang transaction sa view
        return view('transactions.index', compact('transactions'));
    }

    public function create(Request $request)
    {
        // Validate the incoming client data from the form
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'clients_number' => 'required|string|max:255',
            'stalltype_id' => 'required|exists:stall_types,id',
            'stall_number_id' => 'required|exists:stall_numbers,id',
        ]);

        // ICheck kung ang validation ma palpak
        if ($validator->fails()) {
            return redirect()->route('clientform')
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new Client instance and fill in the data
        $client = new Client();
        $client->firstname = $request->input('firstname');
        $client->middlename = $request->input('middlename');
        $client->lastname = $request->input('lastname');
        $client->clients_number = $request->input('clients_number');
        $client->stalltype_id = $request->input('stalltype_id');
        $client->stall_number_id = $request->input('stall_number_id');

        // Save the client
        $client->save();

        // Fetch the associated StallType and StallNumber
        $stalltype = StallTypes::findOrFail($client->stalltype_id);
        $stallnumber = StallNumber::findOrFail($client->stall_number_id);

        // Create a new Transaction
        $transaction = new Transaction();
        $transaction->client_id = $client->id;
        $transaction->amount = $stalltype->price;
        $transaction->description = "Client $client->firstname successfully added to own $stalltype->stall_name with a monthly payment of $transaction->amount on stall number $stallnumber->stall_number";
        $transaction->save();

        // Store the client data in the session for feedback
        Session::flash('client_data', [
            'firstname' => $client->firstname,
            'stalltype_name' => $stalltype->stall_name,
            'amount' => $transaction->amount,
            'stall_number' => $stallnumber->stall_number,
        ]);

        // Redirect to the Transaction view
        return redirect()->route('transactions.index');
    }
}
