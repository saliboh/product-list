<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PER_PAGE = 10;

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(self::PER_PAGE);

        if ($request->ajax()) {
            return view('products.product_list', compact('products'));
        }

        return view('products.index', compact('products'));
    }
}
