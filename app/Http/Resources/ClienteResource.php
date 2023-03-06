<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'rol'=> $this->rol,
            'dni'=> $this->dni,
            'apellidos' => $this->apellidos,
            'direccion' => $this->direcion,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'salario' => $this->salario,
            'estado' => $this->estado,
            'updated_at'=> $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
