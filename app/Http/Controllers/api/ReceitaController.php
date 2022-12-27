<?php

namespace App\Http\Controllers\api;

use App\Api\ApiError;
use App\Http\Controllers\Controller;
use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    private $receita;

    public function __construct(Receita $receita) {

        $this->receita = $receita;
    }

    public function index()
    {
        return response()->json($this->receita->paginate(5));
    }


    public function store(Request $request)
    {
        try {
            $receitaData = ($request->all());
            $this->receita->create($receitaData);

            $return_msg = ['data' => ['msg' => 'Receita criada com sucesso!']];
            return response()->json($return_msg, 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Erro ao executar operação create', 1010), 500);
        }


    }


    public function show($id)
    {
        $receita = $this->receita->find($id);

        if (! $receita) return response()->json(ApiError::errorMessage('Receita não encontrada!', 4040), 404);

        $data = ['data' => $receita];

        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        try {
            $receitaData = $request->all();
            $receita = $this->receita->find($id);
            $receita->update($receitaData);

            $return_msg = ['data' => ['msg' => 'Receita atualizada com sucesso!']];
            return response()->json($return_msg, 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            }
            return response()->json(ApiError::errorMessage('Erro ao executar operação de atualizar', 1011), 500);
        }
    }


    public function destroy(Receita $id)
    {
        try {
            $id->delete();

            return response()->json(['data' => ['msg' => 'Receita: ' . $id->name . ' removido com sucesso!' ]], 200);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
            }
            return response()->json(ApiError::errorMessage('Erro ao executar operação de remover receita', 1012), 500);
        }
    }
}
