<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Citation;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;


class ClientInfoController extends Controller

{

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $clientInfo = ClientInfo::findOrFail($id);

            // Update the related stall's status to "available"
            $stallNumber = $clientInfo->stallNumber;
            $stallNumber->status = 'available';
            $stallNumber->save();

            // Delete the client information
            $clientInfo->delete();

            DB::commit();

            return redirect()->route('client_info.index')->with('success', 'Client info deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client_info.index')->with('error', 'Failed to delete client info. Please try again.');
        }
    }


    public function index()
    {
        $clientInfos = ClientInfo::with(['client', 'stallNumber', 'stallType'])->get();
    
        // Create an array to store the citation counts for each client's stall
        $citationCounts = [];
    
        foreach ($clientInfos as $clientInfo) {
            $clientName = $clientInfo->client->firstname . ' ' . $clientInfo->client->middlename . ' ' . $clientInfo->client->lastname;
            
            // Calculate and store the citation count for each client's stall
            $citationCounts[$clientName] = Citation::where('stall_number_id', $clientInfo->stallNumber->id)->count();
        }
    
        return view('client_info.index', compact('clientInfos', 'citationCounts'));
    }
    
    
    
    
    
    public function addclientinfo()
    {
        $clients = Client::all();
        $stalltypes = StallTypes::all();
        $stallnumbers = StallNumber::all();
    
        return view('client_info.add', compact('clients', 'stalltypes', 'stallnumbers'));
    }
    
    public function clientinfostore(Request $request)
    {
        // Validation rules and messages
        $rules = [
            'client_id' => 'required|exists:clients,id',
            'stall_type_id' => 'required|exists:stall_types,id',
            'stall_number_id' => 'required|exists:stall_numbers,id',
            'start_date' => 'required|date',
            'due_date' => 'required|date|after:start_date',
        ];
    
        $messages = [
            'stall_number_id.exists' => 'The selected stall number does not exist.',
            'stall_type_id.exists' => 'The selected stall type does not exist.',
            'due_date.after' => 'The due date must be after the start date.',
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules, $messages);
    
        try {
            DB::beginTransaction();
    
            // Check if a client info record with the same client_id already exists
            $existingClientInfo = ClientInfo::where('client_id', $validatedData['client_id'])->first();
    
            if ($existingClientInfo) {
                return redirect()
                    ->route('client_info.index')
                    ->with('error', 'The client already has a stall registered.');
            }
    
            // Ensure the stall number status is updated to 'occupied'
            $stallNumber = StallNumber::findOrFail($validatedData['stall_number_id']);
            $stallNumber->status = 'occupied';
            $stallNumber->save();
    
            // Create a new client info record
            ClientInfo::create($validatedData);
    
            DB::commit();
    
            return redirect()
                ->route('client_info.index')
                ->with('success', 'Stall Holder successfully created!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('client_info.index')
                ->with('error', 'Failed to create client info. Please try again.');
        }
    }
    
    public function updateClient(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'stall_type_id' => 'required|exists:stall_types,id',
            'stall_number_id' => 'required|exists:stall_numbers,id',
        ]);

        $clientInfo = ClientInfo::findOrFail($id);

        try {
            DB::beginTransaction();

            // Check if the selected stall number belongs to the specified stall type
            $stallType = StallTypes::findOrFail($validatedData['stall_type_id']);
            $stallNumber = StallNumber::findOrFail($validatedData['stall_number_id']);

            if ($stallNumber->stall_type_id !== $stallType->id) {
                throw ValidationException::withMessages(['stall_number_id' => 'The selected stall number is not valid for the chosen stall type.']);
            }

            $clientInfo->update($validatedData);

            DB::commit();

            return redirect()->route('client_info.index')->with('success', 'Client info updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client_info.index')->with('error', 'Failed to update client info. Please try again.');
        }
    }

    public function addStall()
{
    $stallTypes = StallTypes::all();
    $stallNumbers = StallNumber::all();

    return view('client_info.add_stall', compact('stallTypes', 'stallNumbers'));


}

public function getDropdownOptions(Request $request)
{
    $clientId = $request->input('clientId');

    // Fetch dropdown options based on the selected client
    $stallTypes = StallTypes::where('client_id', $clientId)->get();
    
    // Filter available stalls by status "occupied"
    $stallNumbers = StallNumber::where('client_id', $clientId)
        ->where('status', 'occupied')
        ->get();
    
    $violations = Violation::all(); // You can customize this based on your requirements

    return response()->json([
        'stallTypes' => $stallTypes,
        'stallNumbers' => $stallNumbers,
        'violations' => $violations,
    ]);
}


public function storeStall(Request $request)
{
    $validatedData = $request->validate([
        'stall_name' => 'required|string|max:255',
        'stall_number' => 'required|string|max:255',
    ]);

    // Create a new stall record
    StallTypes::create([
        'stall_name' => $validatedData['stall_name'],
        'stall_number' => $validatedData['stall_number'],
    ]);

    return redirect()->route('add_stall')->with('success', 'Stall added successfully!');
}

public function getAvailableStalls($stalltype_id)
{
    // Retrieve available stall numbers for the selected stall type
    $availableStalls = StallNumber::where('stall_type_id', $stalltype_id)
        ->where('status', 'available')
        ->pluck('stall_number', 'id');

    return response()->json($availableStalls);
}

public function violationbilling($id)
{
    $clientInfo = ClientInfo::findOrFail($id);
    $clients = Client::all();
    $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get(); 
    $stallTypes = StallTypes::all();
    $stallNumbers = StallNumber::all();
    $violations = Violation::all();

    return view('client_info.violationbilling', compact('clientInfo', 'clientInfos','violations'));
}

public function startScheduledSMS()
{
    Artisan::call('send:due-date-reminders');
    return redirect()->back()->with('success', 'Scheduled SMS for Stall Holders started.');
}





}