<?php

namespace App\Http\Controllers;

use App\Paasontbijt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PaasontbijtController extends Controller
{
    public function index()
    {
        return view('pages.paasontbijt.registration');
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
            return redirect('paasontbijt')
            ->withErrors($validator)
            ->withInput();
        }

        $total_kinderen = (int)$request->input('order.kinderen') * 10;
        $total_volwassenen = (int)$request->input('order.volwassenen') * 19;

        $total_price = $total_kinderen + $total_volwassenen;

        $bestelling = Paasontbijt::create([
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

        Mail::send('mails.paasontbijt-confirmation', ['bestelling' => $bestelling], function ($m) use ($bestelling) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            $m->to($bestelling->email, $bestelling->name)->subject('Bestelling KKFC - Paasontbijt');
            $m->bcc(['nickhellemans93+kkfc@gmail.com', 'claes.wim@hotmail.com']);
        });

        return view('pages.paasontbijt.success')->with('bestelling', $bestelling);
    }
}
