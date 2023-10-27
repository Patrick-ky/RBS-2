<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StallTypes;
use App\Models\ClientInfo;
use App\Models\Client;
use Illuminate\Database\QueryException;

class StallTypesController extends Controller
{
    public function index()
    {
        $stalltypes = StallTypes::all();
        return view('stall-types.index', compact('stalltypes'));
    }

    public function create()
    {
        return view('stall-types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'stall_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $existingStalltype = StallTypes::where('stall_name', $data['stall_name'])->first();

        if ($existingStalltype) {
            return redirect()->route('stall-types.create')->with('error', 'This type of stall already exists');
        }

        $stalltype = StallTypes::create($data);

        return redirect(route('stall-types.index'))->with('success', 'Stall type successfully added!');
    }

    public function edit($id)
    {
        $stalltype = StallTypes::findOrFail($id);
        return view('stall-types.edit', compact('stalltype'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'stall_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $stalltype = StallTypes::findOrFail($id);
        $existingPrice = $stalltype->price; // Kuhaon ang price

        $stalltype->update($data); // iupdate ang stall type sa bago na data

  

        return redirect()->route('stall-types.index')->with('success', 'Stall type updated successfully');
    }

    public function destroy($id)
    {
        try {
            $stalltype = StallTypes::findOrFail($id);

            $associatedClients = Client::where('stall_type_id', $id)->count();

            if ($associatedClients > 0) {
                return redirect()->route('stall-types.index')
                    ->with('error', 'Cannot delete the stall. Some clients have rented it.');
            }

            $stalltype->delete();

            return redirect()->route('stall-types.index')->with('success', 'Stall type deleted successfully');
        } catch (QueryException $e) {
            return redirect()->route('stall-types.index')->with('error', 'An error occurred while deleting the stall type.');
        }
    }
}
