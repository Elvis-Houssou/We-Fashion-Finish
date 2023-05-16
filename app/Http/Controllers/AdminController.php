<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function produit()
    {
        $products = Product::with('categories')->latest()->paginate(15);
        return view('admin.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * Display a listing of the resource.
     */
    public function category()
    {
        $categories = Category::paginate(15);
        return view('admin.categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * Display a listing of the resource.
     */
    public function createProduct()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

     /**
     * Display a listing of the resource.
     */
    public function createCategory()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }


    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        // $categories = Category::all();
        return view('admin.categories.edit', compact('category'));
    }
}
