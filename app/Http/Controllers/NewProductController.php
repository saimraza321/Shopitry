<?php

namespace App\Http\Controllers;
use App\Models\NewProduct;
use App\Models\Category;

use Illuminate\Http\Request;

class NewProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = NewProduct::join('categories', 'newproduct.category', '=', 'categories.id')
        ->select('newproduct.*', 'categories.name as category_name')
        ->get();  
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = NewProduct::all(); 
        $categories = Category::all();
        return view('Admin.products.create', compact('products','categories'));
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
        $newProducts = new NewProduct();
        $newProducts->name = $request->name;
        $newProducts->price = $request->price;
        $newProducts->category = $request->category;
        $newProducts->image = $filename;
        $newProducts->save();
        return redirect()->route('newproduct.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $products = NewProduct::find($id);
        return view('Admin.products.edit', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newproducts = NewProduct::find($id);
    
    
        $CurrentImage = $newproducts->image;
        $filename = null;
    
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
    
        // Use the correct variable name here
        $newproducts->name = $request->input('name');
        $newproducts->price = $request->price;
        $newproducts->category = $request->category;
        $newproducts->image = $filename ? $filename : $CurrentImage;
        $newproducts->update();
    
        return redirect()->route('newproduct.index')->with('success', 'Product updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $newproduct = NewProduct::find($id);
        $newproduct->delete();
        return redirect()->route('newproduct.index')->with('success', 'newproduct deleted successfully');
    }
}
