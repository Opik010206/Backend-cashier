<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    public $table = 'jenis';
    public $guarded = ['id'];

    public function category (){
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
    // public function menu(){
    //     return $this->hasMany(Menu::class, 'menu_id', 'id');
    // }
}
