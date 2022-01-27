<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
    public function store(){

        request()->validate([
            'nombre'=> 'required',
            'email'=> 'required'
        ]);

        Mail::to('maiteladaria@gmail.com')->send();

        return 'Mensaje enviado';
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
