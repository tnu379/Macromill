<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $categoryName = $request->get('search');
        // $arrayCategoryId = Category::getCategoryIdsByName($categoryName);
        $products = Product::paginate(10);
        // return response()->json($products);
        return view('products.index', ['products' => $products]);
    }


    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isOk  = $this->checkValidate($request->post('name'));
        if($isOk['status']){
            return json_encode( $isOk );
        }
        // If validation passes, create the user
        // User::create($request->all());

        return response()->json(['message' => 'User created successfully']);
    }

    public function create(Request $request)
    {
        return view('products.create');
    }


    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return response()->json([
            'message' => 'Product deleted successfully!'
        ], 200);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product =  $this->productService->updateProduct($product, $validatedData);
        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ], 200);
    }
    public function checkValidate($value){
        $req =[
            'status' => false,
            'key' => 'name',
            'mess'=>'',
        ];
        if(empty($value)){
            $req['status'] = true;
            $req['mess'] = 'tên không được để trống';
        }elseif(strlen($value) > 255){
            $req['status'] = true;
            $req['mess'] = 'ký tự quá dài';
        }

        return $req;

    }
}
