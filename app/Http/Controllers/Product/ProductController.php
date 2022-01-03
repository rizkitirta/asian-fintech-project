<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Get All Product
    public function getProduct()
    {
        try {
            $data = Product::paginate(2);

            return response()->json([
                'success' => true,
                'message' => 'Data Retrieved Successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);
        }
    }

    //Get Product Detail
    public function getProductDetail($id)
    {
        try {
            $data = Product::with('detail', 'category')->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Data Retrieved Successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);
        }
    }

    //Get product with sort new product & range price
    public function getProductSort(Request $request)
    {
        try {
            $data = Product::with('detail')
                ->leftJoin('product_detail', 'product_detail.id', '=', 'product.id')
                ->when($request->new_product, function ($q) use ($request) {
                    $q->orderBy('product_detail.created_at', $request->new_product);
                })
                ->when($request->price, function ($q) use ($request) {
                    $q->orderBy('product_detail.product_price', $request->price);
                })
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Data Retrieved Successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);
        }
    }

    //Get By Group Category
    public function getByCategory(Request $request)
    {
        try {
            $data = Product::with('detail', 'category')->get()->groupBy('category.name');

            return response()->json([
                'success' => true,
                'message' => 'Data Retrieved Successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);
        }
    }
}
