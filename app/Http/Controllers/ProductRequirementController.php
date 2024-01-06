<?php

namespace App\Http\Controllers;

use App\Models\ProductRequirement;
use Exception;
use Illuminate\Http\Request;

class ProductRequirementController extends Controller
{
    public function index(Request $request)
    {
        //Pegando o id na requisição
        $product_id = $request->query('product_id');

        //Listar apenas o id do jogo que desejo listar
        //Fazer um select onde o product_id da requisição for igual o product_id da tabela
        $productsRequirements = ProductRequirement::query()->where('product_id', $product_id)->get();
        return $productsRequirements;
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                "product_id" => 'integer|required',
            ]);

            //Procurar um requisito do sistema com o product_id e o type se são iguais ao corpo da requisição
            //first pega o primeiro dado que encontrar em forma de objeto e não de array
            $productRequirementTypeExists = ProductRequirement::query()
                ->where('product_id', $data['product_id'])
                ->where('type', $data['type'])
                ->first();

            if ($productRequirementTypeExists) {
                return response()->json(['message' => 'O requisito do sistema já está cadastrado'], 409);
            }

            $productRequirement = ProductRequirement::create($data);

            return $productRequirement;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $productRequirement = ProductRequirement::find($id);

        if (!$productRequirement) return response()->json(['message' => 'O requisito do sistema não foi encontrado'], 404);

        return $productRequirement;
    }

    public function update($id, Request $request)
    {
        try {

            $productRequirement = ProductRequirement::find($id);

            if (!$productRequirement) return response()->json(['message' => 'O requisito do sistema não foi encontrado'], 404);

            $request->validate([
                "product_id" => 'integer|required'
            ]);

            $productRequirement->update($request->all());

            return $productRequirement;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $productRequirement = ProductRequirement::find($id);

        if (!$productRequirement) return response()->json(['message' => 'O requisito do sistema não foi encontrado'], 404);

        $productRequirement->delete();

        return response(['message' => 'O requisito do sistema foi excluído com sucesso!'], 204);
    }
}
