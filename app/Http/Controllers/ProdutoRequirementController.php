<?php

namespace App\Http\Controllers;

use App\Models\ProductRequirement;
use Illuminate\Http\Request;

class ProdutoRequirementController extends Controller
{
    public function index()
    {
        $products = ProductRequirement::all();
        return $products;
    }

    public function store(Request $request)
    {

        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);
            $data = $request->all();
            $product = ProductRequirement::create($data);
            return $product;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $productRequeriment = ProductRequirement::find($id);

        if (!$productRequeriment) return response()->json(['message' => 'Produto não encontrado'], 404);

        return $productRequeriment;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);

            $productRequeriment = ProductRequirement::find($id);

            if (!$productRequeriment) return response()->json(['message' => 'Produto não encontrado'], 404);

            $productRequeriment->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $productRequeriment = ProductRequirement::find($id);
        if (!$productRequeriment) return response()->json(['message' => 'Produto não encontrado'], 404);

        $productRequeriment->delete();
        return response('', 204);
    }

    // AJUSTAR
}
