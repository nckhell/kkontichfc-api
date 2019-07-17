<?php

namespace App\Http\Controllers;
use App\YouthInscription;
use App\Http\Resources\YouthInscription as YouthInscriptionResource;
use App\Http\Resources\YouthInscriptionsCollection;
use Illuminate\Support\Facades\Mail;
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

		// Send e-mail
        Mail::send('mails.youthinscription-confirmation', ['data' => $request->all()], function ($m) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            // $m->bcc('nickhellemans93@gmail.com', 'Nick Hellemans');
            $m->to('nickhellemans93@gmail.com', 'Info - K. Kontich F.C.')->subject('Online inschrijving via kkontichfc.be');
            // $m->to('jeugd@kkontichfc.be', 'Info - K. Kontich F.C.')->subject('Online inschrijving via kkontichfc.be');
        });

        return (new YouthInscriptionResource($youthInscription))
                ->response()
                ->setStatusCode(201);
    }
}
