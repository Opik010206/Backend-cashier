<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $table = 'produk';
    public $guarded = ['id'];

    public function category (){
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
}
