<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('products.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'main_image' => 'image|mimes:jpeg,png,gif,webp,svg|max:2048'
        ]);

        $product = Product::create($request->all());

        if($request->hasFile('main_image'))
        {
            $products->main_image = $request->file('main_image')->store('products', 'public');
        } else {
            $products->main_image = null;
        }

        $products->save();

        return redirect()->route('products.index')->with('status', 'El producto se ha creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $users = User::all();
        return view('products.edit', compact('products', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'main_image' => 'image|mimes:jpeg,png,gif,webp,svg|max:2048'
        ]);

        $product->update($request->all());

        //imagen
        if($request->hasFile('main_image'))
        {
            Storage::disk('public')->delete($product->main_image);
            $product->main_image = $request->file('main_image')->store('products', 'public');
            $product->save();
        }



        //retornar
        return redirect()->route('products.index')
            ->with('status', 'El producto se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Producto::find($id);
        Storage::disk('public')->delete($product->main_image);
        $product->delete();

        return redirect()->route('products.index')
        ->with('status', 'Eliminado con exito');
    }
}
