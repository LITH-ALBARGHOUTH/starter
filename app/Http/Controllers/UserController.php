<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getIndex(){
        return view('welcome') -> with('name' , 'Ali');        
    }
}
