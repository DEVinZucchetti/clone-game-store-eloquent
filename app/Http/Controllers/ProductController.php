<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:products|string|max:150'
            ]);

            $data = $request->all();
            $product = Product::create($data);

            return $product;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return $product;
    }

    public function update($id, Request $request)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json(['message' => 'Produto não encontrado'], 404);
            }

            $product->update($request->all());

            return $product;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produto deletado com sucesso']);
    }
}