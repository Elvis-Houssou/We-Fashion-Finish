<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
// use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    public function solde()
    {
        $products = Product::with('categories')->where('state', "En solde")->paginate(6);

        return view('users.solde.index', compact('products'));
    }

    public function homme()
    {
        $products = Product::with('categories')->where('category_id', 1)->paginate(6);

        return view('users.homme.index', compact('products'));
    }

    public function femme()
    {
        $products = Product::with('categories')->where('category_id', 2)->paginate(6);
        // $products = ProductResource::collection(Product::with('categories:name'))->where('visibility', 'Publié')->inRandomOrder()->paginate(6);

        return view('users.femme.index', compact('products'));
    }

    public function show(Product $product, $id)
    {
        // $product = Product::findOrFail($id);
        $product = Product::with('categories')->where('id', $id)->first();


        return view('users.show', compact('product'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProduct(Request $request)
    {
        $request = request();
        $categorie = Category::find($request->input('category_id'));
        // $size = $request->input('size');
        $size = implode(',', $request->input('size'));
        // $size = $request->file('size');




        $results = $request->all();
        $results['size'] = $size;

        // dd($results);

        $images = $request->file('images');
        $filename = Str::uuid()->toString(). "." . $images->getClientOriginalExtension();

        if ($request->hasFile('images')) {
            $images->move('images', $filename);
            $results['images'] = $filename;

        }

        $product = new Product;
        $product->fill($results);

        $product->categories()->associate($categorie);
        $product->save();



        return redirect()->route('product');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProduct(UpdateProductRequest $request, Product $product, $id)
    {
        $request = request();
        $categorie = Category::find($request->input('category_id'));
        $size = implode(',', $request->input('size'));



        $results = $request->all();
        $results['size'] = $size;


        $images = $request->file('images');
        $filename = Str::uuid()->toString(). "." . $images->getClientOriginalExtension();

        if ($request->hasFile('images')) {
                Storage::delete('images' . $product->image);

                // $images->move(storage_path('app/public/images'), $filename);
                $images->move('images', $filename);

                $results['images'] = $filename;
        }else{
            $product->image = $request->input('old_image');
        }


        $product = Product::find($id);

        $product->categories()->associate($categorie);
        $product->update($results);


        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);


        $product->delete();

        return redirect()->route('product');
    }
}
