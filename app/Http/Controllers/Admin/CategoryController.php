<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Category resource list
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::orderBy('id','DESC')->get();
        return view('backend.category.index',['categories'=>$categories]);
    }

    /**
     * Category resource create
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.category.create');
    }

    /**
     * Category resource store
     *
     * @param \Illuminate\Http\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request){
        Category::create([
            'name'   => $request->category_name,
            'status' => $request->status
        ]);

        return back()->with('success','Category has been saved.');
    }

    /**
     * Category resource edit
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        return view('backend.category.edit',['category'=>$category]);
    }

    /**
     * Category resource update
     *
     * @param \App\Models\Category $category
     * @param \Illuminate\Http\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category){

        $category->update([
            'name'   => $request->category_name,
            'status' => $request->status
        ]);

        return back()->with('success','Category has been updated.');
    }

    /**
     * Category resource remove
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category){
        $category->delete();

        return back()->with('success','Category has been deleted.');
    }
}
