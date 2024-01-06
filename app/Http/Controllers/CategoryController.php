<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories',
                'description' => 'nullable',
            ]);

            $data = $request->all();
            $category = Category::create($data);

            return $category;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) return response()->json(['message' => 'Categoria não encontrada'], 404);

        return $category;
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);

        if (!$category) return response()->json(['message' => 'Categoria não encontrada'], 404);

        try {
            $request->validate([
                'name' => 'required|unique:categories',
                'description' => 'nullable',
            ]);

            $category->update($request->all());
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) return response()->json(['message' => 'Categoria não encontrada'], 404);

        $category->delete();

        return response('', 204);
    }
}