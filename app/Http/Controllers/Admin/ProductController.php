<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index(){
        $products = Product::with('category','brand')->orderBy('id','desc')->get();
        return view('backend.product.index',['products'=>$products]);
    }

    public function create(){
        $data = [
            'brands'=>Brand::latest('id')->where('status',1)->get(),
            'categories'=>Category::latest('id')->where('status',1)->get(),
        ];

        return view('backend.product.create',['data'=>$data]);
    }

    public function store(ProductRequest $request){
        $data = $request->except('_token');
        $data['product_slug'] = Str::slug($request->product_slug);

        // image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->file_upload($request->file('image'),'images/products/');
        }

        Product::create($data);

        return back()->with('success','Product has been saved.');
    }


    public function destroy($product_id){
        $product = Product::findOrFail($product_id);
        $this->file_remove('images/products/',$product->image);

        $product->delete();

        return back()->with('success','Product has been removed.');
    }

    public function edit($product_id){
        $data = [
            'brands'=>Brand::latest('id')->where('status',1)->get(),
            'categories'=>Category::latest('id')->where('status',1)->get(),
        ];

        $product = Product::findOrFail($product_id);

        return view('backend.product.edit',['data'=>$data,'product'=>$product]);
    }


    public function update(Request $request,$product_id){
        $data = $request->except('_token');
        $data['product_slug'] = Str::slug($request->product_slug);

        $product = Product::findOrFail($product_id);

        // image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->file_updated($request->file('image'),'images/products/',$product->image);
        }

        $product->update($data);

        return back()->with('success','Product has been updated.');
    }


    public function show($product_id){
        $product = Product::findOrFail($product_id);
        return view('backend.product.view',['product'=>$product]);
    }

}
