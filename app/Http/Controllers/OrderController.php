<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Casts\Json;

class OrderController extends Controller
{
    public function addProduct($id){
        $product = Product::find($id);
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();

        if ($order){
            $products = collect(json_decode($order->products));
            foreach ($products as $item) {
                if ($item->id === $product->id) {
                    return redirect()->back()->with('status', 'El producto ya se encuentra en el carrito.');
                }
            }
            $products = json_encode($products->push($product));
            $order->update([
                'products' => $products,
                'total' => $order->total + $product->price
            ]);
            $order->save();
        } else {
            $order = new Order;
            $order->user_id = $user_id;
            $order->products = json_encode([$product]);
            $order->total = $product->price;
            $order->status = 1;
            $order->save();
        }
        return redirect()->back()->with('status', 'El producto ha sido agregado con exito al carrito.');
    }

    public function removeProduct($id){
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();
        $products = collect(json_decode($order->products));
        $products = $products->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
        $order->update([
            'products' => json_encode($products),
            'total' => $order->total - Product::find($id)->price
        ]);
        return redirect()->back()->with('success', 'Producto eliminado con exito');
    }

    public function showCart(){
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();
        return view('cart', compact('order'));
    }
}
