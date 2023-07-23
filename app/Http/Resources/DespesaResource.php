<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DespesaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao,
            'data' => $this->data,
            'usuario' => $this->user->name,
            'valor' => $this->valor,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
