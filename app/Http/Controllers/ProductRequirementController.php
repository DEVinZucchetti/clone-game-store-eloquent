<?php

namespace App\Http\Controllers;

use App\Models\ProductRequirement;
use Illuminate\Http\Request;

class ProductRequirementController extends Controller
{
    public function index()
    {
        $productRequirements = ProductRequirement::all();
        return $productRequirements;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer|exists:products,id',
                'operational_system' => 'nullable|string',
                'memory' => 'nullable|string',
                'storage' => 'nullable|string',
                'observations' => 'nullable|string',
                'type' => 'nullable|in:MINIMUNS,RECOMMENDED',
            ]);

            $productRequirement = ProductRequirement::create($request->all());

            return response()->json($productRequirement, 201);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $productRequirement = ProductRequirement::find($id);

        if (!$productRequirement) return response()->json(['message' => 'Produto não encontrado'], 404);

        return $productRequirement;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer|exists:products,id',
                'operational_system' => 'nullable|string',
                'memory' => 'nullable|string',
                'storage' => 'nullable|string',
                'observations' => 'nullable|string',
                'type' => 'nullable|in:MINIMUNS,RECOMMENDED',
            ]);

            $productRequirement = ProductRequirement::find($id);

            if (!$productRequirement) return response()->json(['message' => 'Produto não encontrado'], 404);

            $productRequirement->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $productRequirement = ProductRequirement::find($id);

        if (!$productRequirement) return response()->json(['message' => 'Produto não encontrado'], 404);

        $productRequirement->delete();

        return response('', 204);
    }
}
