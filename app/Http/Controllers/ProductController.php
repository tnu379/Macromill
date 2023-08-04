<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryName = $request->get('search');
        $arrayCategoryId = Category::getCategoryIdsByName($categoryName);
        $products = Product::getProductByCategoryIds($arrayCategoryId);

        if ($request->ajax()) {
            return view('products.partials.partial', compact('products'));
        }

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
}
