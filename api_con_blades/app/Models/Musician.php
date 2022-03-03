<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;

    protected $table = 'musicians';

    protected $fillable = ['nombre', 'categoria','salario','experiencia','descripcion', 'fecha'];

    protected $hidden = [
        'created_at',
        'updated_at'];
}
