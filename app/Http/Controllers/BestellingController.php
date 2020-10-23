<?php

namespace App\Http\Controllers;

use App\Bestelling;
use App\Http\Resources\PaastornooiInscription as PaastornooiInscriptionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BestellingController extends Controller
{
    public function index()
    {
        return view('pages.bestelling.registration');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required|email',
                'tel' => 'required'
            ]
        );
            
        if ($validator->fails()) {
            return redirect('pasta-take-away')
            ->withErrors($validator)
            ->withInput();
        }

        $total_pompoensoep = (int)$request->input('order.pompoensoep') * 4;
        $total_spaghetti_bolognaise = (int)$request->input('order.spaghetti_bolognaise') * 10;
        $total_tagiatelli_kip_champignons = (int)$request->input('order.tagiatelli_kip_champignons') * 13;
        $total_tagiatelli_zalm_en_groentjes = (int)$request->input('order.tagiatelli_zalm_en_groentjes') * 13;
        $total_tagiatelli_scampis_curry = (int)$request->input('order.tagiatelli_scampis_curry') * 13;
        $total_tagiatelli_scampis_lookroom = (int)$request->input('order.tagiatelli_scampis_lookroom') * 13;
        $total_tagiatelli_scampis_tomatenroomsaus = (int)$request->input('order.tagiatelli_scampis_tomatenroomsaus') * 13;
        $total_tiramisu = (int)$request->input('order.tiramisu') * 2.5;
        $total_chocolademousse = (int)$request->input('order.chocolademousse') * 2.5;

        $total_price = $total_pompoensoep 
        + $total_spaghetti_bolognaise 
        + $total_tagiatelli_kip_champignons 
        + $total_tagiatelli_zalm_en_groentjes 
        + $total_tagiatelli_scampis_curry 
        + $total_tagiatelli_scampis_lookroom 
        + $total_tagiatelli_scampis_tomatenroomsaus 
        + $total_tiramisu
        + $total_chocolademousse;

        $bestelling = Bestelling::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'total_price' => strval($total_price),
            'order' => array_filter($request->input('order')),
            'ophaal_of_levering' => $request->input('ophaal_of_levering'),
            'dag' => $request->input('dag'),
            'uur' => $request->input('uur')
        ]);

        Mail::send('mails.bestelling-confirmation', ['bestelling' => $bestelling], function ($m) use ($bestelling) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            $m->to($bestelling->email, $bestelling->name)->subject('Bestelling KKFC - Pasta Take Away Weekend');
            $m->bcc(['nickhellemans93+kkfc@gmail.com', 'wim.claes@kontich.be']);
        });

        return view('pages.bestelling.success')->with('bestelling', $bestelling);
    }
}
