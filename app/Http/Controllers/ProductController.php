<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
                'name' => 'required|unique:products|max:150',
                'description' => 'nullable',
                'cover' => 'nullable|url',
                'price' => 'required|numeric|min:0',
            ]);

            $data = $request->all();
            $product = Product::create($data);

            return response()->json(['message' => 'Produto criado com sucesso', 'product' => $product], 201);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        return $product;
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        try {
            $request->validate([
                'name' => 'required|unique:products|max:150',
                'description' => 'nullable',
                'cover' => 'nullable|url',
                'price' => 'required|numeric|min:0',
            ]);

            $product->update($request->all());

            return response()->json(['message' => 'Produto atualizado com sucesso', 'product' => $product], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        $product->delete();

        return response()->json(['message' => 'Produto deletado com sucesso'], 204);
    }
}
