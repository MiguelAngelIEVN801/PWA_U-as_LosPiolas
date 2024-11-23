<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Producto agregado correctamente');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $imagePath = $request->file('image')->store('products', 'public');
            $product->update(['image' => $imagePath]);
        }

        $product->update($request->only('name', 'price', 'description'));

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente');
    }
}
