<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
   
    $products = Products::join('categories', 'products.category', '=', 'categories.id')
                        ->select('products.*', 'categories.name as category_name')
                        ->get();
    
    return view('Admin.store.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = products::all(); 
        $categories = Category::all();
        return view('Admin.store.create', compact('products','categories'));
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
        $products = new products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->category = $request->category;
        $products->image = $filename;
        $products->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $products = products::find($id);
        return view('Admin.store.edit', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = products::find($id);
    
    
        $CurrentImage = $products->image;
        $filename = null;
    
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
    
        // Use the correct variable name here
        $products->name = $request->input('name');
        $products->price = $request->price;
        $products->category = $request->category;
        $products->image = $filename ? $filename : $CurrentImage;
        $products->update();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $newproduct = products::find($id);
        $newproduct->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully');
    }
    public function filter(Request $request) {
        $query = Products::query();
        
        $products = Products::all(); 
        $categories  =  Category::all();
        $brands = Brand::all();
    
        // Apply category filters
        if ($request->has('categories')) {
            $query->whereIn('id', $request->categories);
        }
    
        // Apply brand filters
        if ($request->has('brands')) {
            $query->whereIn('id', $request->brands);
        }
    
        // Apply price filters
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }
    
        $products = $query->get();
        
        return view('Front-end.store',compact('products','categories', 'brands'));
    }
    
}
