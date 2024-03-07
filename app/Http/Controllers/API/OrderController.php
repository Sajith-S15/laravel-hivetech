<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderApiResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @group Orders
     * @bodyParam zip_code integer. example: 12345

     * @authenticated
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['string', 'required', 'max:100'],
            'customer_phone' => ['string', 'required', 'max:50'],
            'address' => ['string', 'required', 'max:255'],
            'zip_code' => ['required', 'regex:/^\d{5}(-\d{4})?$/'],
            'building_type' => ['nullable', 'string', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
            'state' => ['string', 'required', 'max:255'],
            'order_items' => ['required', 'array'],
            'order_items.*.qty' => ['required', 'integer', 'min:1'],
            'order_items.*.product_id' => ['required','integer', 'exists:products,id'],
        ], [
            'zip_code.regex' => 'The zip code format is invalid. Please enter a valid zip code.',
        ]);

        // Create order
        $order = $request->user()->orders()->create([
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'address' => $validated['address'],
            'zip_code' => $validated['zip_code'],
            'building_type' => $validated['building_type'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'total_price' => 0,
            'total_qty' => 0
        ]);

        $totalPrice = 0;
        $totalQty = 0;

        $productId = [];

        // Create order items
        foreach ($validated['order_items'] as $item) {
            $orderItem = $order->orderItems()->create([
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
            ]);
            $productId[] = $item['product_id'];

            // Update total_price in order model
            $totalPrice += $orderItem->product->price * $orderItem->qty;
            $totalQty += $item['qty'];
        }

        $order->update([
            'total_price' => $totalPrice,
            'total_qty' => $totalQty,
        ]);

        $request->user()->carts()->whereIn('product_id', $productId)->delete();


        return response()->json(OrderApiResource::make($order), 201);
    }
}
