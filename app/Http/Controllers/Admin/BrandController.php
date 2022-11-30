<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(15);
        return view('backend.brand.index',['brands'=>$brands]);
    }

    public function create(){
        return view('backend.brand.create');
    }

    public function store(BrandRequest $request){
        Brand::create([
            'name'   => $request->brand_name,
            'status' => $request->status
        ]);

        return back()->with('success','Brand has been saved.');
    }

    public function edit(Brand $brand){
        return view('backend.brand.edit',['brand'=>$brand]);
    }

    public function update(BrandRequest $request, Brand $brand){
        $brand->update([
            'name'   => $request->brand_name,
            'status' => $request->status
        ]);

        return back()->with('success','Brand has been updated.');
    }

    public function delete(Brand $brand){
        $brand->delete();

        return back()->with('success','Brand has been deleted.');
    }
}
