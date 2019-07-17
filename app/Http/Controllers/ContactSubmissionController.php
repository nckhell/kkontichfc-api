<?php

namespace App\Http\Controllers;
use App\ContactSubmission;
use App\Http\Resources\ContactSubmission as ContactSubmissionResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'		=> 'required',
            'email'		=> 'required|email',
            'message'   => 'required'
        ]);

        $contactSubmission = ContactSubmission::create($request->all());

		// Send e-mail
        Mail::send('mails.contact-message', ['data' => $request->all()], function ($m) {
            $m->from('no-reply@kkontichfc.be', 'K. Kontich F.C.');
            $m->to('info@kkontichfc.be', 'Info - K. Kontich F.C.')->subject('Nieuwe vraag via contactformulier op kkonticfc.be');
            $m->bcc('nickhellemans93+kkfc@gmail.com', 'Nick Hellemans');
        });

        return (new ContactSubmissionResource($contactSubmission))
                ->response()
                ->setStatusCode(201);
    }
}
