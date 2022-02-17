<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\PresupuestoMaximo;
use App\Services\GetPresupuestoService;

class ChartsApiController extends Controller
{
    public function index()
    {
        $presupuestos = PresupuestoMaximo::all();
        $dates = $presupuestos->pluck('created_at');
        $labels = [];
        foreach( $dates as $label){
            array_push($labels, $label->format('d-m-Y') );
        }
        $data = $presupuestos->pluck('total');

        $getPres = new GetPresupuestoService();

        $paid = $getPres->getPaid();

        $pending = $getPres->getPending();

        return response()->json(compact('labels', 'data', 'paid', 'pending'));
    }
}
