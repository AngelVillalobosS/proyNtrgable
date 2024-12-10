<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class anime_survey extends Model
{
    use HasFactory;

    protected $table = 'anime_survey';
    protected $primaryKey = 'id_survey';

    protected $fillable = [
        'name_per', 'a_pa', 'a_ma', 'year', 'sexo', 'happiness', 'stars', 
        'requests', 'id_content', 'id_categorie', 'genre', 'studio', 
        'suggestions', 'dev_comments', 'archivo', 'activo', 'updated_at', 'created_at'];
}