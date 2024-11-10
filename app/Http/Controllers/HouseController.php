<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::all();
        return view('house.house-index.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('house.house-create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('houses', 'public');
        }

        House::create($data);
        return redirect()->route('houses.index')->with('success', 'House added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('house.house-show.index', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        return view('house.house-edit.index', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($house->image) {
                Storage::disk('public')->delete($house->image);
            }
            $data['image'] = $request->file('image')->store('houses', 'public');
        }

        $house->update($data);
        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        if ($house->image) {
            Storage::disk('public')->delete($house->image);
        }
        $house->delete();
        return redirect()->route('houses.index')->with('success', 'House deleted successfully.');
    }
}
