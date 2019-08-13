<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['id', 'id_usuario', 'modelo','color','tamano','total','info'];
}
