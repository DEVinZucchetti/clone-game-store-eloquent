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

            return $this->successResponse($avaliation, count($avaliation) . ' avaliações encontradas.');
        } catch (\Exception $e) {
            return $this->errorResponse('Erro interno do servidor.', 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|string|max:255',
                'recommended' => 'required|boolean',
            ]);

            $avaliation = Avaliation::create($request->all());

            return $this->successResponse($avaliation, 'Avaliação cadastrada com sucesso.');
        } catch (\Exception $e) {
            return $this->errorResponse('Erro interno do servidor.', 500);
        }
    }

    public function show($id)
    {
        $avaliation = Avaliation::find($id);

        if (!$avaliation) {
            return $this->errorResponse('Avaliação não encontrada.', 404);
        }

        return $avaliation;
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'description' => 'required|string|max:255',
                'recommended' => 'required|boolean',
            ]);

            $avaliation = Avaliation::findOrFail($id);
            $avaliation->update($request->all());

            return $this->successResponse($avaliation, 'Avaliação atualizada com sucesso.');
        } catch (\Exception $e) {
            return $this->errorResponse('Erro interno do servidor.', 500);
        }
    }

    public function destroy($id)
    {
        try {
            $avaliation = Avaliation::findOrFail($id);
            $avaliation->delete();

            return $this->successResponse($avaliation, 'Avaliação deletada com sucesso.');
        } catch (\Exception $e) {
            return $this->errorResponse('Erro interno do servidor.', 500);
        }
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

