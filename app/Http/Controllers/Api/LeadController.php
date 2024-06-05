<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact as MailNewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store(Request $request){

        $data = $request->all();
        $validator = Validator::make($data,
        [
            'name'=> 'required|min:3|max:100',
            'email'=> 'required|email',
            'message'=> 'required|min:3',
        ],
        [
            'name.required' => 'nome obbligatoiro',
            'name.min' => ':min caratteri',
            'name.max' => ':max caratteri',
            'email.required' => 'email obbligatoiro',
            'email.email' => 'email errata',
            'message.required' => 'message obbligatoiro',
            'message.min' => ':min caratteri',
        ]
        );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));

        };

        //salvo email in db
        $new_lead = new Lead();
        $new_lead ->fill($data);
        $new_lead ->save();

        //invio email
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewContact($new_lead));
        //restituisco json con avvenuto invio

        $success = true;
        return response()->json(compact('success'));
    }
}
