<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{

    public function getProductTypes() {
        return [
            'cake',
            'bread',
            'pizza',
            'beverages'
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       $product = Products::where('id', $request->id)
       ->first();

       return view('pages.buy-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
