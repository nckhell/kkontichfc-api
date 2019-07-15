<?php

namespace App\Http\Controllers;
use App\PaastornooiInscription;
use App\Http\Resources\PaastornooiInscription as PaastornooiInscriptionResource;

use Illuminate\Http\Request;

class PaastornooiInscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        ]);

        $paastornooiInscription = PaastornooiInscription::create($request->all());

        return (new YouthInscriptionResource($youthInscription))
                ->response()
                ->setStatusCode(201);
    }
}
