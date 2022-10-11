<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novio;

class NovioController extends Controller
{
    public string $novia;
    public string $novianovio;

    public function novios(){

        return view('novios');
    }

    public function edit( Request $request){
        dd($request);

    }

}
