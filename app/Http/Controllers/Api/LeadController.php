<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;

use Illuminate\Http\Request;

class LeadController extends Controller
{


    public function store(Request $request)
    {

        // validare dati del lead
        // $data = $request->all();


        // salvare dati del lead nel database
        // $newLead = new Lead();

        // $newLead->name = $data['name']; //Da inserire in un secondo momento nel form se si vuole
        // $newLead->email         = $data['email'];
        // $newLead->message       = $data['message'];
        // $newLead->save();




        //inviare mail al lead

        //inviare mail all'amministratore per gestire richiesta lead

        // ritornare un valore di successo al frontend

        // return response()->json($request->all()); // Serve solo per testare/debuggare e verificare che in Network risulti la richiesta

    }
}
