<?php
namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
      
        $achievements = Achievement::all();
        return $achievements;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer',
                'url' => 'required|integer',
                'name' => 'required|unique:achievements|string',
                'description' => 'nullable|string',
            ]);

            $data = $request->all();
            $achievement = Achievement::create($data);

            return $achievement;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $achievement = Achievement::find($id);

        if (!$achievement) return response()->json(['message' => 'Conquista não encontrada'], 404);

        return $achievement;
    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer',
                'url' => 'required|integer',
                'name' => 'required|unique:achievements|string',
                'description' => 'nullable|string',
            ]);

            $achievement = Achievement::find($id);

            if (!$achievement) return response()->json(['message' => 'Conquista não encontrada'], 404);

            $achievement->update($request->all());

            return $achievement;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $achievement = Achievement::find($id);

        if (!$achievement) return response()->json(['message' => 'Conquista não encontrada'], 404);

        $achievement->delete();

        return response(['message' => 'Conquista excluída com sucesso!'], 204);
    }
}