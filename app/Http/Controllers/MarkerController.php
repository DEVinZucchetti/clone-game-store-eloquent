<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function index()
    {
        $markers = Marker::all();
        return $markers;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:markers|string|max:100'
            ]);
            $data = $request->all();
            $marker = Marker::create($data);
            return $marker;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $markers = Marker::find($id);

        if (!$markers) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $markers;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);

            $markers = Marker::find($id);

            if (!$markers) return response()->json(['message' => 'Produto não encontrado'], 404);

            $markers->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $markers = Marker::find($id);

        if (!$markers) return response()->json(['message' => 'ativo não encontrado'], 404);

        $markers->delete();

        return response('deletado', 204);
    }
}
