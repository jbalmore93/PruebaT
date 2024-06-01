<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cat';
    protected $fillable = [
        'nombre_cat',
        'descripcion_cat'
    ];

    public function Productos():HasOne{
        return $this->hasOne(Producto::class,'id_cat','cat_id');
    }
}
