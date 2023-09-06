<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Mail\MailToLead;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    private $validations = [
        'doctor_id'        => 'required|integer',
        'email'            => 'required|email|max:250',
        'message'          => 'required|string',
    ];

    public function index()
    {
        $messages = Message::paginate(100);

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->validations);

        if ($validator->fails()) {
            return response()->json([
                'success'  => false,
                'errors'   => $validator->errors(),
            ]);
        }

        // salvare i dati del message nel DB

        $newMessage = new Message();

        $newMessage->doctor_id   = $data['doctor_id'];
        $newMessage->email          = $data['email'];
        $newMessage->text        = $data['text'];
        $newMessage->save();

        $doctor = Doctor::find($data['doctor']);

        if (!$doctor) {
            // Gestisci il caso in cui il dottore non esista
            return response()->json([
                'success' => false,
                'error' => 'Il dottore specificato non esiste',
            ], 404);
        }

        // ritornare un valore di successo al frontend

        try {
            // inviare il nuovo messaggio

            Mail::to($newMessage->email)->send(new MailToLead($newMessage, $doctor));

            return response()->json([
                'success' => true,
                'message' => 'Messaggio inviato con successo',
                'doctor' => $doctor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Errore durante l\'invio dell\'email: ' . $e->getMessage(),
            ], 500);
        }
    }
}
