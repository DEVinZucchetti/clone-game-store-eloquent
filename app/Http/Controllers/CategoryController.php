<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        return $categorys;
    }

    public function store(Request $request)
    {

        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);
            $data = $request->all();
            $categorys = Category::create($data);
            return $categorys;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $categorys = Category::find($id);

        if (!$categorys) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $categorys;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validade([
                'name' => 'required|unique:products|string|max:150'
            ]);

            $categorys = Category::find($id);

            if (!$categorys) return response()->json(['message' => 'Produto não encontrado'], 404);

            $categorys->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $categorys = Category::find($id);
        if (!$categorys) return response()->json(['message' => 'Produto não encontrado'], 404);

        $categorys->delete();
        return response('', 204);
    }
}
