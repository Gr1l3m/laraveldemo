<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Create
    public function createProduct(Request $request) {
        $products = new Product();
        $products->sku = $request->sku;
        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->user_id = $request->user_id;
        // todo: foreign id of the user
        $products->save();

        return response()->json([
            "message" => "Product created"
        ], 201);
    }

    // Read - all or one
    public function getAllProduct() {
        $products = Product::get()->toJson(JSON_PRETTY_PRINT);
        return response($products, 200);
    }

    public function getProduct($id) {
        if (Product::where('id', $id)->exists()) {
            $product = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($product, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }

    // Update
    public function updateProduct(Request $request, $id) {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->sku = is_null($request->sku) ? $product->sku : $request->sku;
            $product->name = is_null($request->name) ? $product->name : $request->name;
            $product->quantity = is_null($request->quantity) ? $product->quantity : $request->quantity;
            $product->price = is_null($request->price) ? $product->price : $request->price;
            $product->description = is_null($request->description) ? $product->description : $request->description;
            $product->user_id = is_null($request->user_id) ? $product->user_id : $request->user_id;

            $product->save();

            return response()->json([
                "message" => "Updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);

        }
    }

    // Delete
    public function deleteProduct($id) {
        if(Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                "message" => "Product deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }
}
