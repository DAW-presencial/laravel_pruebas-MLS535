<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $table= 'agenda';
    protected $fillable = ['name','category','number','date','size','gender','description','email','image', 'user_id'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
