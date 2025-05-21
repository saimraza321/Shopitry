<?php

namespace App\Http\Controllers;
use App\Models\top_selling;

use Illuminate\Http\Request;

class TopSellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $top_selling = top_selling::all(); 
        return view('Admin.top_selling.index', compact('top_selling'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $top_selling = top_selling::all(); 
        return view('Admin.top_selling.create', compact('top_selling'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = null;
        if ($request->hasFile('image')) {
            $filename = time(). '.'. $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
        $top_selling = new top_selling();
        $top_selling->name = $request->name;
        $top_selling->price = $request->price;
        $top_selling->oldprice = $request->oldprice;
        $top_selling->rating = $request->rating;
        $top_selling->category = $request->category;
        $top_selling->image = $filename;
        $top_selling->save();
        return redirect()->route('newproduct.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $top_selling = top_selling::find($id);
        return view('Admin.top_selling.edit', compact('top_selling'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $top_selling = top_selling::find($id);
    
    
        $CurrentImage = $top_selling->image;
        $filename = null;
    
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
    
        // Use the correct variable name here
        $top_selling->name = $request->input('name');
        $top_selling->price = $request->price;
        $top_selling->category = $request->category;
        $top_selling->image = $filename ? $filename : $CurrentImage;
        $top_selling->update();
    
        return redirect()->route('newproduct.index')->with('success', 'Product updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $newproduct = top_selling::find($id);
        $newproduct->delete();
        return redirect()->route('newproduct.index')->with('success', 'newproduct deleted successfully');
    }
}
