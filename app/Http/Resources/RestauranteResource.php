<?php

namespace App\Http\Resources;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestauranteResource extends JsonResource
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
            'ciudad' => $this->ciudad,
            'telefono'=> $this->telefono,
            'latitud'=> $this->latitud,
            'longitud' => $this->longitud,
            //'platos' => PlatoResource::collection($this->componentes),
            'updated_at'=> $this->updated_at,
            'created_at' => $this->created_at
        ];
    }

    public static function create(Request $request){
        $restaurante = new Restaurante();
        $restaurante->nombre = $request->input('nombre');
        $restaurante->direccion = $request->input('direccion');
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->latitud = $request->input('latitud');
        $restaurante->longitud = $request->input('longitud');
    
    
    
        $restaurante->save();
    
        return response()->json(['msg:' => 'El restaurante ha sido creado correctamente']);
    }
}
