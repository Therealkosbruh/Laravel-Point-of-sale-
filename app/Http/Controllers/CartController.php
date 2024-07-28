<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Type;
use Auth;
use DB;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $cartItems = DB::table('carts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('types as t', 'p.type_id', '=', 't.id')
            ->select('p.img', 'c.user_id as user_id ', 'p.id as product_id', 'p.price as product_price', 'p.name as product_name', 't.name as type_name')
            ->where('c.user_id', $userId)
            ->get();

        return view('cart', compact('cartItems'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $existingCart = Cart::where('user_id', $request->input('user_id'))
            ->where('product_id', $request->input('product_id'))
            ->first();
    
        if ($existingCart) {
            return redirect()->route('product.show', $request->input('product_id'))->with('warning', 'Товар уже есть в корзине!');
        } else {
            Cart::create([
                'user_id' => $request->input('user_id'),
                'product_id' => $request->input('product_id'),
                'quantity' => 1,
            ]);
    
            return redirect()->route('product.show', $request->input('product_id'))->with('success', 'Товар добавлен в корзину!');
    }
}
    public function destroy(Request $request)
{
    $userId = Auth::id();
    $product_id = $request->route('product_id');
    Cart::where('user_id', $userId)
        ->where('product_id', $product_id)
        ->delete();
    return redirect()->route('user.cart')->with('success', 'Товар удален из корзины!');
}
}
