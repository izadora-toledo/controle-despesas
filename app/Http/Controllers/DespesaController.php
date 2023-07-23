<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Http\Requests\DespesaRequest;
use App\Http\Resources\DespesaResource;
use Illuminate\Support\Facades\Auth;

class DespesaController extends Controller
{
    public function index()
    {
        $despesas = Despesa::all();
        return DespesaResource::collection($despesas);
    }

    public function store(DespesaRequest $request)
    {
        $data = $request->validated();

        $userId = auth()->user()->id;

        $data['id_usuario'] = $userId;

        $despesa = Despesa::create($data);
        return new DespesaResource($despesa);
    }

    public function show(Despesa $despesa)
    {
        return new DespesaResource($despesa);
    }

    public function update(DespesaRequest $request, Despesa $despesa)
    {

        if ($despesa->id_usuario !== Auth::user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $despesa->update($request->validated());

        return new DespesaResource($despesa);
    }

    public function destroy(Despesa $despesa)
    {
        if ($despesa->id_usuario !== Auth::user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $despesa->delete();
        return response()->json(['message' => 'Despesa deleted successfully']);
    }
}
