<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Billing;
use App\Models\Citation;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class BillingController extends Controller
{

   

    public function index()
    {
        //igrupo ang client information base sa pangalan ug collect stall information
        $clientInfo = ClientInfo::with('client', 'stallNumber', 'stallType')->get();
        $groupedData = [];
    
        foreach ($clientInfo as $billing) {
            $clientName = $billing->client->firstname . ' ' . $billing->client->middlename . ' ' . $billing->client->lastname;
    
            //pag ang client kay wala pa sa grouped data, I add
            if (!isset($groupedData[$clientName])) {
                $groupedData[$clientName] = [
                    'client' => $billing->client,
                    'stalls' => [],
                ];
            }
    
            //idungag ang stall information sa clients data
            $groupedData[$clientName]['stalls'][] = [
                'stallType' => $billing->stallType,
                'stallNumber' => $billing->stallNumber,
                'due_date' => $billing->due_date,
                'price' => $billing->stallType->price,
            ];
        }
    
        return view('billings.index', compact('groupedData'));
    }
    
    




    // public function index()
    // {
    //     // double  updated price

        
    //     $stalltypes = StallTypes::all();
        
    //     foreach ($stalltypes as $stalltype) {
    //         $stalltype->price *= 2;
    //         $stalltype->save();
    //     }
    //     $billings = Billing::with('client', 'violation')->get();

    //     return view('billings.index', compact('billings'));
    // }

    // public function create()
    // {
    //     $clients = Client::all();
    //     $stalltypes = StallTypes::all();
    //     $stallnumbers = StallNumber::with('stallType')->get();
    
    //     $data = [
    //         'clients' => $clients,
    //         'stalltypes' => $stalltypes,
    //         'stallnumbers' => $stallnumbers,
    //     ];
    
    //     return view('billings.create', $data);
    // }
    
    

}








