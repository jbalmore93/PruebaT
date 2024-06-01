<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pro';
    protected $fillable = [
        'nombre_pro',
        'descripcion_pro',
        'precio_pro',
        'cat_id'
    ];

    public function categorias():BelongsTo{
       return $this->belongsTo(Categoria::class,'cat_id','id_cat');
    }
}
