<?php

namespace App\Http\Controllers;

use App\Kleding;
use App\Http\Resources\PaastornooiInscription as PaastornooiInscriptionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KledingController extends Controller
{
    public function index()
    {
        return view('pages.kleding.order');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), 
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'birth_date' => 'required',
                'member_type' => 'required',
                'sweater_champ' => 'required',
                'socks_glasgow' => 'required',
                'short_manchester_black' => 'required',
                't_shirt_jako_red' => 'nullable',
                'training_pants_classico' => 'nullable',
            ]
        );
            
        if ($validator->fails()) {
            return redirect('kleding')
            ->withErrors($validator)
            ->withInput();
        }
            

        Kleding::create($request->all());

        return view('pages.kleding.success');
    }
}
