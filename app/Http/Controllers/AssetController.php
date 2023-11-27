<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Exception;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return $assets;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:150'
            ]);

            $data = $request->all();

            $asset = Asset::create($data);

            return $asset;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $asset = Asset::find($id);

        if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $asset;
    }

    public function update($id, Request $request)
    {
        try {


            $asset = Asset::find($id);

            if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

            $request->validate([
                'name' => 'required|string|max:150'
            ]);

            $asset->update($request->all());

            return $asset;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $asset = Asset::find($id);

        if (!$asset) return response()->json(['message' => 'ativo não encontrado'], 404);

        $asset->delete();

        return response('deletado', 204);
    }
}
