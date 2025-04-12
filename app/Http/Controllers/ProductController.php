<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
        public function index(Request $request)
    {
        $query = Product::query();
    
        if ($request->has('kategori') && $request->kategori !== 'semua') {
            $query->where('category', $request->kategori);
        }
    
        $products = $query->paginate(9);
        return view('galeri', compact('products'));
    }

    public function adminIndex()
    {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);
    
        $path = $request->file('image')->store('stnk_files', 'public');
        $validated['image'] = $path;
    
        Product::create($validated);
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }
    
        $product->delete();
    
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
    

}
