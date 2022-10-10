<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novio;

class WelcomeController extends Controller
{
    //
    public function index(){

        $novio = Novio::where('novio', 'like', TRUE)->first();
        $novia = Novio::where('novia', 'like', TRUE)->first();

        return view('welcome2', [
            'novio' => $novio,
            'novia' => $novia
        ]);
    }
}
