<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::join('products', 'orders.product_id', 'products.id')
        ->select(
            'products.name', 
            'products.price', 
            'products.type', 
            'orders.id',
            'orders.*'
        )
        ->where('orders.user_id',  Auth::user()->id)
        ->orderBy('orders.id', 'desc')
        ->get();

        return view('pages.orders-list', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $request->totalPrice,
            'payment' => $request->payment,
            'change' => $request->change,
        ];
        
        Orders::create($data);

        return redirect(route('ordersList'))->with('success', 'Product Succesfully Bought!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function delete(Request $request)
    {
        Orders::where('id', $request->id)->delete();

        return [
            'status' => 200,
            'message' => 'Purchase Deleted!'
        ];
    }
}
