<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'precio' => $this->precio,
            'categoria'=> $this->categoria,
            'latitud'=> $this->latitud,
            'restaurante_id' => $this->restaurante_id,
            'updated_at'=> $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
