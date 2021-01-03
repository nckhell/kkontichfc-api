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
            return redirect('take-away-stoofpotjes')
            ->withErrors($validator)
            ->withInput();
        }

        $total_broccoli_courgettesoep = (int)$request->input('order.broccoli_courgettesoep') * 4;
        $total_stoofpotje_rundvlees = (int)$request->input('order.stoofpotje_rundvlees') * 15;
        $total_stoofpotje_kip = (int)$request->input('order.stoofpotje_kip') * 15;
        $total_vispannetje = (int)$request->input('order.vispannetje') * 15;
        $total_tiramisu = (int)$request->input('order.tiramisu') * 2.5;
        $total_chocolademousse = (int)$request->input('order.chocolademousse') * 2.5;

        $total_price = $total_broccoli_courgettesoep 
        + $total_stoofpotje_rundvlees 
        + $total_stoofpotje_kip 
        + $total_vispannetje 
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
            $m->to($bestelling->email, $bestelling->name)->subject('Bestelling KKFC - Take Away Stoofpotjes Weekend');
            $m->bcc(['nickhellemans93+kkfc@gmail.com', 'claes.wim@hotmail.com']);
        });

        return view('pages.bestelling.success')->with('bestelling', $bestelling);
    }
}
