<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novio;

class NovioController extends Controller
{
    public function novios(){

        return view('novios');
    }

    public function edit( Request $request){


    }

}
