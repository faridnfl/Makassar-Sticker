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

}
