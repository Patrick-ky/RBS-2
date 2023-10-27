<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\Billing;
use App\Models\StallTypes;

class ViolationController extends Controller
{

    public function index()
    {
        $violations = Violation::all();

        $data = [
            'violations' => $violations,
        ];

        return view('violations.index', $data);
    }

    public function create() {

        return view('violations.create');
    }

    public function store(Request $request) { 
        
        $data = $request->validate([ 
            'violation_name' => 'required',
            'penalty_value' => 'required|numeric',
    
        ]);
     
        $existingviolation = Violation::where('violation_name', $data['violation_name'])->first();

        if ($existingviolation) {
            // Billing record kay na ulit na sa  client, magpakita ug error message tapos ma redirect
            return redirect()->route('violation.index')->with('error', 'This type of violation is already exist .');
        }
        
        $violation = Violation::create($data);
        return redirect(route('violation.index'))->with('success', 'Violation successfully created!'); 
    }

    public function edit($id)
{
    $violation = Violation::findOrFail($id);

    return view('violations.edit', compact('violation'));
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'violation_name' => 'required',
        'penalty_value' => 'required|numeric',
    ]);

    $violation = Violation::findOrFail($id);

    $violation->penalty_value = $data['penalty_value'];
    // Update the violation attributes based on the form data
    $violation->update($data);

    // Update the total_balance in associated billing records
    $billings = Billing::where('violation_id', $id)->get();

    foreach ($billings as $billing) {
        $client = $billing->client; 
        $stallType = $client->stallType;
        $stalltypePrice = $stallType->price;
        
        $billing->total_balance = $violation->penalty_value + $stalltypePrice;
        $billing->save();
    }


    return redirect()->route('violation.index')->with('success', 'Violation updated successfully');
}

public function destroy($id)
{
    try {
        $violation = Violation::findOrFail($id);
        $violation->delete();

        return redirect()->route('violation.index')->with('success', 'Violation deleted successfully');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('violation.index')->with('error', 'Cannot delete violation. Some clients may have acquired it.');
    }
}


}
