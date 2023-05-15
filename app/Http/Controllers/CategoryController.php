<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCategory(Request $request)
    {
        $request = request();
        // $categorie = Category::find($request->input('category_id'));
        // $size = $request->input('size');
        // $size = implode(',', $request->input('size'));
        // $size = $request->file('size');




        $results = $request->all();

        // dd($results);

        $category = new Category;
        $category->fill($results);

        $category->save();
        // $category->categories(;



        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(UpdateCategoryRequest $request, Category $category, $id)
    {
        $request = request();

        $results = $request->all();

        // $category = new Category;
        $category = Category::find($id);

        $category->fill($results);

        $category->save();

        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);


        $category->delete();

        return redirect()->route('category');
    }
}
