<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartApiResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @group Carts
     *
     * list all cart belong to authentication user

     * @authenticated
     */
    public function index(Request $request)
    {
        $carts = $request->user()->carts()->with('product', 'product.category', 'product.type')->get();
        return response()->json(CartApiResource::collection($carts));
    }

    /**
     * @group Carts
     *
     * store a new cart

     * @authenticated
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric', 'exists:products,id']
        ]);


        $cart = $request->user()->carts()->where('product_id', $validated['product_id'])->with('product')->first();

        if ($cart) {
            return response()->json(['error' => 'Cart already existed.'], 400);
        }

        $cart = $request->user()->carts()->create([
            'quantity' => $validated['quantity'],
            'product_id' => $validated['product_id']
        ]);

        return response()->json(CartApiResource::make($cart));
    }


    /**
     * @group Carts
     *
     * update specific cart items

     * @authenticated
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        $quantity = $validated['quantity'];

        $cart = $request->user()->carts()->with('product')->find($id);

        if (!$cart) {
            return response()->json(['error' => 'Cart not found.'], 404);
        }

        if ($quantity < 1) {
            $cart->delete();
            return response()->json(['message' => 'Deleted successfully.']);
        }

        $cart->quantity = $quantity;
        $cart->save();
        return response()->json(CartApiResource::make($cart));
    }
}
