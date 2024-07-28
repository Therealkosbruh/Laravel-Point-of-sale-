<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
 
    }

    public function user_index(Request $request){
        
    }

    public function create(Request $request)
    {    
        $user = Auth::user();
    
        $total = $request->input('total');
        $cartItems = $request->input('cartItems');
    
        $order = new Order();
        $order->user_id = $user->id;
        $order->total_price = $total;
        $order->status = 'new'; 
        $order->save();
    
        foreach ($cartItems as $item) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item['product_id'];
            $orderProduct->quantity = $item['quantity'];
            $orderProduct->save();

            $product = Product::find($item['product_id']);
            $product->quantity -= $item['quantity'];
            $product->save();
        }
        Cart::where('user_id', $user->id)->delete();
        return redirect()->route('product.index');  
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
