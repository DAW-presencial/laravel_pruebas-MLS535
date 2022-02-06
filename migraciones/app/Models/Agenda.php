<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use HasFactory;

    public $table = 'agenda';

// Esta propiedad hace que solo se puedan guardar en la base de
//datos los campos indicados en el array

    protected $fillable = ['name', 'email', 'phone', 'address',
        'user_id'];

// Esta propiedad sirve para evitar que se guarden o modifiquen en
//la base de datos los campos que se indican en el array
// protected $guarded = ['status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

