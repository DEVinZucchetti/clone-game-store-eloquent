<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(Request $request)
    {

        $product_id = $request->query('product_id');

        $achievements = Achievement::query()->where('product_id', $product_id)->get();
        return $achievements;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:150'
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

        if (!$achievement) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $achievement;
    }

    public function update($id, Request $request)
    {
        try {


            $achievement = Achievement::find($id);

            if (!$achievement) return response()->json(['message' => 'ativo não encontrado'], 404);

            $request->validate([
                'name' => 'required|string|max:150'
            ]);

            $achievement->update($request->all());

            return $achievement;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $achievement = Achievement::find($id);

        if (!$achievement) return response()->json(['message' => 'A conquista não foi encontrada! Por favor, tente novamente ou envie um ticket para nosso suporte.'], 404);

        $achievement->delete();

        return response(['message' => 'A conquista foi excluída com sucesso!'], 204);
    }
}
