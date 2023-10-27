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

class CitationController extends Controller
{

    public function clientCitation($stall_number_id)
{
    // Kuhaa ang selected stall
    $stall = StallNumber::findOrFail($stall_number_id);

    // Retrieve the list of citations associated with the selected stall
    $citations = Citation::where('stall_number_id', $stall_number_id)->get();

    // Pwede ma kuha ang associated client information dire
    $clientInfo = ClientInfo::where('stall_number_id', $stall_number_id)->first();

    return view('client_info.citation', compact('stall', 'citations', 'clientInfo'));
}

public function violationbilling($id)
{
    $clientInfo = ClientInfo::findOrFail($id);
    $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get();
    $violations = Violation::all();

    // Kuhaa ang violations na naapil sa napili nga stall 
    $citations = Citation::where('stall_number_id', $clientInfo->stall_number_id)->get();

    // Retrieve the stall associated with the client
    $stall = StallNumber::findOrFail($clientInfo->stall_number_id);

    return view('client_info.violationbilling', compact('clientInfo', 'clientInfos', 'violations', 'citations', 'stall'));
}

    
    
    public function reportCitationForm($client_id, $stall_number_id)
    {
        // Makuha ang client information
        $clientInfo = ClientInfo::findOrFail($client_id);
    
        // Makuha ang napili na stall
        $stall = StallNumber::findOrFail($stall_number_id);
    
        // makuha ang listahan sa mga violations
        $violations = Violation::all();
    
        return view('client_info.report-citation', compact('clientInfo', 'stall', 'violations'));
    }
    

    public function storeCitation(Request $request)
    {
        // Validate the form data
        $request->validate([
            'violation_id' => 'required|exists:violations,id',
            'start_date' => 'required|date',
            'stall_type_id' => 'required',
            'client_info_id' => 'required|exists:client_info,id',
            'stall_id' => 'required|exists:stall_numbers,id', // Update validation for stall_id
        ]);
    
        // Kuhaa ang napili na stall_id gikan sa request
        $stallId = $request->input('stall_id');
    
        // Pangitaon ang corresponding stall record
        $stall = StallNumber::findOrFail($stallId);
    
        // Buhat ug mabutang ang citation sa database
        $data = [
            'client_info_id' => $request->input('client_info_id'),
            'violation_id' => $request->input('violation_id'),
            'stall_type_id' => $stall->stall_type_id,
            'stall_number_id' => $stallId,
            'start_date' => $request->input('start_date'),
        ];
    
        Citation::create($data);
    
        return redirect()->route('client_info.violationbilling', ['id' => $request->input('client_info_id')])
            ->with('success', 'Citation for client   created successfully.');
    }
    

    
     
    // public function viewCitations($stall_id)
    // {
      
    //     // Makuha ang listahan sa violation
    //     $violations = Violation::all();
        
    //     $clientInfo = ClientInfo::findOrFail($stall_id);
    //     // Makuha ang napili na stall ug ang iyang citations
    //     $stall = StallNumber::findOrFail($stall_id);
    
    //     //Makuha ang citations nga naa sa napili na stall
    //     $citations = Citation::where('stall_number_id', $stall->id)->get();
    
    //     return view('client_info.citation', compact('stall', 'citations', 'clientInfo','violations'));
    // }




public function records()
{

    $clientinfos = ClientInfo::with(['client', 'stallType', 'stallNumber'])->get();

    foreach ($clientinfos as $clientinfo) {
        $clientinfo->load(['stallType.citations' => function ($query) use ($clientinfo) {
            $query->where('stall_number_id', $clientinfo->stallNumber->id);
        }]);
    }

    return view('billings.record', compact('clientinfos'));
}

    
    
    
    
    
    

}