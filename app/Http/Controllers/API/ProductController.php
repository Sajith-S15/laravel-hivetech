<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductApiResource;

class ProductController extends Controller
{
    /**
     * @group Products
     *
     * list all product
     * @queryParam category_id int required The id of category. Example: 1
     * @queryParam type string required product type. Example: male, female
     * @queryParam search string This search both name and description from products.

     * @authenticated
     */
    public function index(Request $request)
    {
        // Get all products
        $products = Product::query()->with('category')->with('type');

        // Apply category_id and type filters if provided in the request
        if ($request->has('category_id')) {
            $products->where('category_id', $request->category_id);
        }
        if ($request->has('type') && $request->get('type') != "") {
            $products->whereHas('type', function ($query) use ($request) {
                $query->where('name', $request->type);
            });
        }

        // Apply search filter if provided in the request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $products->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // Fetch the filtered and searched products
        $filteredProducts = $products->paginate();

        // Return the filtered products

        return ProductApiResource::collection($filteredProducts);
    }
}
