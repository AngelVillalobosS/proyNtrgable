<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriasAnime extends Model
{
    use HasFactory;

    protected $table = 'cat_anime';

    protected $primaryKey = 'id_categoria';
    protected $fillable = ['name_cat'];
}
