<?php

// StallNumberController.php
namespace App\Http\Controllers;

use App\Models\StallNumber;
use App\Models\StallTypes;
use Illuminate\Http\Request;

class StallNumberController extends Controller
{


    public function index()
    {
        // Kuhaon ang tanan stall numbers sa database
        $stallNumbers = StallNumber::paginate(10);
    
        // I calculate ang bilang sa available ug occupied na stalls
        $availableStallsCount = StallNumber::where('status', 'Available')->count();
        $occupiedStallsCount = StallNumber::where('status', 'Occupied')->count();
    
        return view('stall-number.index', compact('stallNumbers', 'availableStallsCount', 'occupiedStallsCount'));
    }
    
    
    public function view(StallTypes $stallType)
    {
        $stallNumbers = StallNumber::where('stall_type_id', $stallType->id)->get();
        return view('stall-types.stallnumbers.view', compact('stallNumbers', 'stallType'));
    }

    public function create(StallTypes $stallType)
    {
        return view('stall-number.create', compact('stallType'));
    }

    public function store(Request $request)
    {
        // Determine the stall_type_id (e.g., from the $request or other logic)
        $stall_type_id = $request->input('stall_type_id');
    
        // Create a new StallNumber instance with the validated data
        $data = $request->validate([
            'stall_number' => 'required|numeric',
            'nameforstallnumber' => 'required',
            'description' => 'required',
        ]);
        $data['stall_type_id'] = $stall_type_id; // Set the stall_type_id
        $stallNumber = StallNumber::create($data);
    
        return redirect()->route('stall-types.stallnumbers.view', $stall_type_id)
            ->with('success', 'Stall number created successfully');
    }

    public function destroy(StallNumber $stallNumber)
    {
        // Kuhaon ang stall type ID bago ma delete ang stall number
        $stallTypeId = $stallNumber->stall_type_id;
    
        try {
            // Itry idelete ang stall number
            $stallNumber->delete();
            
            return redirect()->route('stall-types.stallnumbers.view', $stallTypeId)
                ->with('success', 'Stall number deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('stall-types.stallnumbers.view', $stallTypeId)
                ->with('error', 'Failed to delete the Stall number : Some Clients may have rented it. ');
        }
    }
    
}

