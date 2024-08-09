<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

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
        $categories = Category::all();
        return view('products.create', compact('users', 'categories'));
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
            'main_image' => 'image|mimes:jpeg,png,gif,svg,jpg|max:2048'
        ]);

        $product = Product::create($request->all());

        if($request->hasFile('main_image'))
        {
            $product->main_image = $request->file('main_image')->store('products', 'public');
        } else {
            $product->main_image = null;
        }

        $product->save();

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
        $product = Product::find($id);
        $users = User::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'users', 'categories'));
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
            'main_image' => 'image|mimes:jpeg,png,gif,svg|max:2048'
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
        $product = Product::find($id);
        if($product->main_image != null){
            Storage::disk('public')->delete($product->main_image);
        }
        $product->delete();

        return redirect()->route('products.index')
        ->with('status', 'Eliminado con exito');
    }
}
