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
        // todo: foreign id of the user
        $products->save();

        return response()->json([
            "message" => "Product created"
        ], 201);
    }

    // Read - all or one
    public function getAllProduct() {
        // logic to get all students goes here
    }

    public function getProduct($id) {
        // logic to get a student record goes here
    }

    // Update
    public function updateProduct(Request $request, $id) {
        // logic to update a student record goes here
    }

    // Delete
    public function deleteProduct($id) {
        // logic to delete a student record goes here
    }
}
