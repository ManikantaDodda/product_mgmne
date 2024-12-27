<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use Spatie\Image\Image;
class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view("index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::all();
        return view('welcome', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(), [
            'product_name'=> 'required|string',
            'quantity' => 'required|numeric|min:0',
            'price'=>'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
           'image_original' => 'nullable|image|mimes:jpeg,jpg',
            'description'=> 'required',
            'attributes' => 'nullable|array',
        ]);

        if ($validate->fails()) {
            return response()->json(['validation error']);
        }

        $image_path = null;
        // if ($request->hasFile('image_original')) {
        //     $image_path = $request->file('image_original')->store('public/products');
        // }
        $image_path = time().'.'.request()->image_original->getClientOriginalExtension();
         request()->image_original->move(public_path('products'), $image_path);
        //  Image::load('products/'.$image_path)
        //  ->width(25)
        //  ->height(25)
        //  ->save();
        $attributes = $request->input('attributes', []); 
         $product = Product::create([
            'product_name'=> $request->product_name,
            'quantity' =>  $request->quantity,
            'price'=>  $request->price,
            'discount' =>  $request->discount,
            'image_original' => $image_path,
            'description'=>  $request->description,
            'image_generated'=> $image_path,
            'image_generated_2'=> $image_path,
            'attributes' =>$attributes,
            ]);
          
            return redirect()->route('products.index')->with('success', 'Product Created successfully.');
        return response()->json(['message'=> 'Product Created','product'=> $product], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        // Validate input fields
        $validate = \Validator::make($request->all(), [
            'product_name' => 'required|string',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'image_original' => 'nullable|image|mimes:jpeg,jpg',
            'description' => 'required',
        ]);
    
        if ($validate->fails()) {
            return response()->json(['validation error'], 422);
        }
    
        $updateData = [
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
        ];
    
        // Check if a new image file is uploaded
        if ($request->hasFile('image_original')) {
            // Delete the old image if it exists
            if ($product->image_original && file_exists(public_path('products/' . $product->image_original))) {
                unlink(public_path('products/' . $product->image_original));
            }
    
            $imagePath = time() . '.' . $request->image_original->getClientOriginalExtension();
            $request->image_original->move(public_path('products'), $imagePath);
    
            $updateData['image_original'] = $imagePath;
            $updateData['image_generated'] = $imagePath;
            $updateData['image_generated_2'] = $imagePath;
        }
    
        $product->update($updateData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
       // return response()->json(['success' => 'Product updated successfully']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully.');

    }
}
