<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Показать корзину
    public function index()
{
    $cartItems = [];
    $total = 0;
    $itemsCount = 0;

    if (auth()->check()) {
        $cartItems = auth()->user()->cart()->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $itemsCount = $cartItems->sum('quantity');
    }

    return view('cart', [
        'cartItems' => $cartItems,
        'total' => $total,
        'itemsCount' => $itemsCount,
        'isEmpty' => $cartItems->isEmpty()
    ]);
}

    // Добавить товар в корзину
    public function addToCart(Product $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите в систему');
        }

        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ],
            [
                'quantity' => \DB::raw('quantity + 1')
            ]
        );

        return back()->with('success', 'Товар добавлен в корзину!');
    }

    // Удалить товар из корзины
    public function remove($id)
    {
        Cart::destroy($id);
        return back()->with('success', 'Товар удалён');
        
    }
    public function count()
{
    return response()->json([
        'count' => auth()->check() ? auth()->user()->cart()->sum('quantity') : 0
    ]);
}
public function update(Request $request, $id)
{
    $cartItem = Cart::findOrFail($id);
    
    if ($request->has('quantity')) {
        $cartItem->quantity = $request->quantity;
    } else {
        $cartItem->quantity += 1;
    }
    
    $cartItem->save();
    
    return back()->with('success', 'Количество обновлено');
}

public function destroy($id)
{
    Cart::destroy($id);
    return back()->with('success', 'Товар удалён из корзины');
}
public function getCartCount()
{
    if (!auth()->check()) {
        return response()->json(['count' => 0]);
    }

    $count = auth()->user()->cart()->sum('quantity');
    return response()->json(['count' => $count]);
}
}