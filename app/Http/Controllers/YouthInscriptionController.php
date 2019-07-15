<?php

namespace App\Http\Controllers;
use App\YouthInscription;
use App\Http\Resources\YouthInscription as YouthInscriptionResource;
use App\Http\Resources\YouthInscriptionsCollection;

use Illuminate\Http\Request;

class YouthInscriptionController extends Controller
{
    public function index()
    {
        return new YouthInscriptionsCollection(YouthInscription::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname'		=> 'required',
            'lastname'		=> 'required',
            'sex'			=> 'required',
            'address'		=> 'required',
            'postal'		=> 'required',
            'city'			=> 'required',
            'email'			=> 'required|email',
            'tel'			=> 'required',
            'birthDate'		=> 'required',
            'birthPlace'	=> 'required',
            'nationality'   => 'required',
            'RRN'		    => 'required',
            'recaptcha'     => 'required'
        ]);

        $youthInscription = YouthInscription::create($request->all());

        return (new YouthInscriptionResource($youthInscription))
                ->response()
                ->setStatusCode(201);
    }
}
