<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurante;
use App\Models\Pedido;

class Plato extends Model
{
    use HasFactory;
    public function restaurante(){
        return $this->belongsTo(Restaurante::class);
    }

    public function pedidos(){
        return $this->belongsTo(Pedido::class);
    }
}
