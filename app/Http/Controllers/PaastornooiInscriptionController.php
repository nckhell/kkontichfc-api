<?php

namespace App\Http\Controllers;
use App\PaastornooiInscription;
use App\Http\Resources\PaastornooiInscription as PaastornooiInscriptionResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PaastornooiInscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'gc'		    => 'required',
            'club'		    => 'required',
            'stamnummer'	=> 'required',
            'shirtColor'	=> 'required',
            'pantsColor'    => 'required',
            'team'			=> 'required',
            'contactName'	=> 'required',
            'contactAddress'=> 'required',
            'contactTel'	=> 'required',
            'contactEmail'	=> 'required|email',
        ]);

        $paastornooiInscription = PaastornooiInscription::create($request->all());

		// Send e-mail
        Mail::send('mails.paastornooi-confirmation', ['data' => $request->all()], function ($m) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            // $m->bcc('nickhellemans93@gmail.com', 'Nick Hellemans');
            $m->to('nickhellemans93@gmail.com', 'Info - K. Kontich F.C.')->subject('Inschrijving Paastornooi via kkontichfc.be');
            // $m->to('jeugd@kkontichfc.be', 'Info - K. Kontich F.C.')->subject('Inschrijving Paastornooi via kkontichfc.be');
        });

		// Send e-mail
        // Mail::send('mails.paastornooi-confirmation', ['data' => $data], function ($m) use ($data) {
        //     $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
        //     $m->bcc(['nickhellemans93@gmail.com']);
        //     $m->cc('jeugd@kkontichfc.be', 'Jeugd - K. Kontich F.C.');
        //     $m->to($data['email'], $data['contactName'])->subject('Inschrijving paastornooi via kkontichfc.be');
        // });

        return (new PaastornooiInscriptionResource($paastornooiInscription))
                ->response()
                ->setStatusCode(201);
    }
}
