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
            'gc'            => 'required',
            'club'            => 'required',
            'stamnummer'    => 'required',
            'shirtColor'    => 'required',
            'pantsColor'    => 'required',
            'team'            => 'required',
            'contactName'    => 'required',
            'contactAddress' => 'required',
            'contactTel'    => 'required',
            'contactEmail'    => 'required|email',
        ]);

        $paastornooiInscription = PaastornooiInscription::create($request->all());

        Mail::send('mails.paastornooi-confirmation', ['data' => $request->all()], function ($m) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            $m->to('jeugd@kkontichfc.be', 'Jeugd - K. Kontich F.C.')->subject('Inschrijving Vermant-Cup via kkontichfc.be');
            $m->bcc('knegtel.theos@skynet.be', 'Theo Knegtel');
        });

        Mail::send('mails.paastornooi-confirmation-client', ['data' => $request->all()], function ($m) use ($request) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            $m->to($request->input('contactEmail'), $request->input('contactName'))->subject('Inschrijving Vermant-Cup via kkontichfc.be');
        });

        return (new PaastornooiInscriptionResource($paastornooiInscription))
            ->response()
            ->setStatusCode(201);
    }
}
