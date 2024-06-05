<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        //slvo email in db
        //invio email
        //restituisco json con avvenuto invio
        $success = true;
        return response()->json(compact('success'));
    }
}
