<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $guarded = ['id'];

    public function produk(){
        return $this->hasMany(Produk::class, 'categori_id', 'id');
    }
    public function jenis(){
        return $this->hasMany(Jenis::class, 'kategori_id', 'id');
    }
}
