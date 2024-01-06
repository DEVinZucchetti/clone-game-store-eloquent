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
                'name' => 'required|unique:markers|string|max:100',
                'color' => 'required|string|max:20', 
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
        $marker = Marker::find($id);

        if (!$marker) return response()->json(['message' => 'Marker não encontrado'], 404);

        return $marker;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:markers|string|max:150',
                'color' => 'string|max:20', 
            ]);

            $marker = Marker::find($id);

            if (!$marker) return response()->json(['message' => 'Marker não encontrado'], 404);

            $marker->update($request->all());

            return $marker; 
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $marker = Marker::find($id);

        if (!$marker) return response()->json(['message' => 'Marker não encontrado'], 404);

        $marker->delete();

        return response('Deletado', 204);
    }
}
