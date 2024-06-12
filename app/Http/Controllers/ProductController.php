<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        // this method will show product page
        $products = Product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'products' => $products
    ]);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////
    public function create()
    {
        // this method will show product page
        return view('products.create');
    }

//////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        // this method will store a product in db
        $rules = [
            'name' =>'required|min:5',
            'serial' =>'required|min:3',
            'price' =>'required|numeric'
        ];

        if ($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
        // here we will insert product db
        $product = new Product();
        $product->name = $request->name;
        $product->serial = $request->serial;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        
        
        if ($request->image != ""){
        // here we will store image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; // unique image name

        // save image to product directory
        $image->move(public_path('uploads/products'),$imageName);

        // save image in DB
        $product->image = $imageName;
        $product->save();
        }
        
        return redirect()->route('product.index')->with('success','Product add successfully.');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit()
    {
        // this method will show edit page
        return view('products.edit');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function update()
    {
        // this method will update a product
        return view();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function destroy()
    {
        // this method will delete a product
        return view();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
}
