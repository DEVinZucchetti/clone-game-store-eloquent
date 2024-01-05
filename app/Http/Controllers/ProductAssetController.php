<?php

namespace App\Http\Controllers;

use App\Models\ProductAsset;
use Illuminate\Http\Request;

class ProductAssetController extends Controller
{
    public function index()
    {
        $assets = ProductAsset::all();
        return $assets;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:150'
            ]);

            $data = $request->all();

            $asset = ProductAsset::create($data);

            return $asset;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $asset = ProductAsset::find($id);

        if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $asset;
    }

    public function update($id, Request $request)
    {
        try {


            $asset = ProductAsset::find($id);

            if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

            $request->validate([
                'name' => 'required|string|max:150'
            ]);

            $asset->update($request->all());

            return $asset;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $asset = ProductAsset::find($id);

        if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

        $asset->delete();

        return response('deletado', 204);
    }
}
