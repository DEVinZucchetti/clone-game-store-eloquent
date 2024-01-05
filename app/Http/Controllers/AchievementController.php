<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Exception;

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
        $achievement = Achievement::find($id);

        if (!$achievement) return response()->json(['message' => 'A conquista não foi encontrada! Por favor, tente novamente ou envie um ticket para nosso suporte.'], 404);

        $achievement->delete();

        return response(['message' => 'A conquista foi excluída com sucesso!'], 204);
    }
}
