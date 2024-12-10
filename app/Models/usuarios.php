<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $primaryKey = 'id_usuario';
    protected $fillable = (['id_usuario','email', 'psswrd', 'tipo', 'nombre']);
}
