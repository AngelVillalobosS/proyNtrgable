<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_categorie';
    protected $fillable = ['categorie'];
}