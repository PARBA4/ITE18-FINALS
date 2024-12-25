<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = [
            'Electronics',
            'Furniture',
            'Clothing',
            'Books',
            'Toys'
        ];

        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Item::create([
            'name' => $request->name,
            'category' =>  $request->category,
            'description' => $request->description
        ]);

        return redirect('/item')->with('status','Item Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {   
        $categories = [
            'Electronics',
            'Furniture',
            'Clothing',
            'Books',
            'Toys'
        ];

        return view('item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $item->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return redirect('/item')->with('status','Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/item')->with('status','Item Deleted Successfully');
    }
}