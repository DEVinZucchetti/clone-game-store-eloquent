<?php

namespace App\Http\Controllers;

use App\Models\ProductMarker;
use Exception;
use Illuminate\Http\Request;

class ProductMarkerController extends Controller
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
                'product_id' => 'required|integer',
                'marker_id' => 'required|integer'
            ]);
            $data = $request->all();
            $productMarker = ProductMarker::create($data);

            return $productMarker;
        } catch (Exception $exception) {
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
        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);

            $product = Product::find($id);

            if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

            $product->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Produto não encontrado'], 404);

        $product->delete();
        return response('', 204);
    }
}
