<?php

namespace App\Http\Controllers;

use App\Covid;
use App\Http\Resources\PaastornooiInscription as PaastornooiInscriptionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CovidController extends Controller
{
    public function index()
    {
        return view('pages.covid.welcome');
    }

    public function registrationForm()
    {
        return view('pages.covid.registration');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'postal' => 'required',
                'email' => 'required|email',
                'tel' => 'required'
            ]
        );
            
        if ($validator->fails()) {
            return redirect('covid-registratie')
            ->withErrors($validator)
            ->withInput();
        }
            

        Covid::create($request->all());

        return view('pages.covid.success');
    }
}
