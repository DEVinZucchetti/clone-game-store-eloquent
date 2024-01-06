<?php

namespace App\Http\Controllers;

use App\Models\ProductMarker;
use Illuminate\Http\Request;

class ProductMarkerController extends Controller
{
    public function index()
    {
        $productMarkers = ProductMarker::all();
        return $productMarkers;
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
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $productMarker = ProductMarker::find($id);

        if (!$productMarker) return response()->json(['message' => 'Produto não encontrado'], 404);

        return $productMarker;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer',
                'marker_id' => 'required|integer'
            ]);

            $productMarker = ProductMarker::find($id);

            if (!$productMarker) return response()->json(['message' => 'Produto não encontrado'], 404);

            $productMarker->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $productMarker = ProductMarker::find($id);

        if (!$productMarker) return response()->json(['message' => 'Produto não encontrado'], 404);

        $productMarker->delete();

        return response('', 204);
    }
}
