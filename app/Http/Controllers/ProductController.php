<?php

namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required',
            'Price' => 'required|numeric',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $productData = $request->except('Image');

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('Image');
            $productData['Image'] = $imagePath;
        }

        Product::create($productData);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    
   
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
  
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
  
 
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'pro_name' => 'required',
            'Price' => 'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
   
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}