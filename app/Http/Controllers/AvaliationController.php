<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;
use Illuminate\Http\Request;

class AvaliationController extends Controller
{
    public function index()
    {
        try {
            $avaliation = Avaliation::all();

            return response()->json([
                'success' => true,
                'data' => $avaliation,
                'message' => count($avaliation) . ' avaliações encontradas.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {

            // Cria uma avaliação
            $avaliation = Avaliation::create([
                'description' => $request->input('description'),
                'recommended' => $request->input('recommended'),

            ]);
            return response()->json([
                'success' => true,
                'data' => $avaliation,
                'message' => 'Avaliação cadastrada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor(aqui).'
            ], 500);
        }
    }

    public function show($id)
    {
        $avaliation = Avaliation::find($id);

        if (!$avaliation) return response()->json(['message' => 'ativo não encontrado'], 404);

        return $avaliation;
    }

    public function update(Request $request, $id)
    {
        try {

            // Busca a avaliação pelo ID
            $avaliation = Avaliation::find($id);

            // Se a avaliation não existir, retorna um erro
            if (!$avaliation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Avaliação não encontrada.'
                ], 404);
            }

            // Atualiza os dados de uma avaliação
            $avaliation->update([
                'description' => $request->input('description'),
                'recommended' => $request->input('recommended'),
            ]);

            return response()->json([
                'success' => true,
                'data' => $avaliation,
                'message' => 'Avaliação atualizada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {

            $avaliation = Avaliation::find($id);

            // Se a avaliation não existir, retorna um erro
            if (!$avaliation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Avaliação não encontrada.'
                ], 404);
            }

            // Remove a pessoa do banco de dados
            $avaliation->delete();

            return response()->json([
                'success' => true,
                'data' => $avaliation,
                'message' => 'Avaliação deletada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }
}
