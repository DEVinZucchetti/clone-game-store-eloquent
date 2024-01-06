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
                'name' => 'required|string|max:150',
            ]);

            $asset = ProductAsset::create($request->all());

            return $this->successResponse($asset, 'Ativo criado com sucesso.');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }

    public function show($id)
    {
        $asset = ProductAsset::find($id);

        if (!$asset) return $this->errorResponse('Ativo não encontrado.', 404);

        return $asset;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:150',
            ]);

            $asset = ProductAsset::findOrFail($id);
            $asset->update($request->all());

            return $this->successResponse($asset, 'Ativo atualizado com sucesso.');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        $asset = ProductAsset::find($id);

        if (!$asset) return $this->errorResponse('Ativo não encontrado.', 404);

        $asset->delete();

        return response('Deletado', 204);
    }

    private function successResponse($data, $message)
    {
        return response()->json(['success' => true, 'data' => $data, 'message' => $message], 200);
    }

    private function errorResponse($message, $statusCode)
    {
        return response()->json(['success' => false, 'message' => $message], $statusCode);
    }
}
