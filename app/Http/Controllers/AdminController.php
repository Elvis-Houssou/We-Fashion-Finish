<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function produit()
    {
        return view('admin.products.index');
    }

     /**
     * Display a listing of the resource.
     */
    public function category()
    {
        return view('admin.categories.index');
    }
}
