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
        'doctor_slug' => 'required|exists:doctors,slug',
        'email'       => 'required|email|max:250',
        'text'        => 'required|string',
    ];

    public function index()
    {
        $messages = Message::paginate(100);

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
    }

    public function store(Request $request, $doctor_slug)
    {
        $data = $request->validate($this->validations);

        // Ottenere l'ID del dottore dallo slug
        $doctor = Doctor::where('slug', $doctor_slug)->first();

        if (!$doctor) {
            // Gestisci il caso in cui il dottore non esista
            return response()->json([
                'success' => false,
                'error'   => 'Il dottore specificato non esiste',
            ], 404);
        }

        // Salvare i dati del messaggio nel DB
        $message = new Message($data);
        $message->doctor_id = $doctor->id;
        $message->save();

        // Invia l'email
        try {
            Mail::to($message->email)->send(new MailToLead($message, $doctor))->view('admin.messages.index');

            return response()->json([
                'success' => true,
                'message' => 'Messaggio inviato con successo',
                'doctor'  => $doctor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => 'Errore durante l\'invio dell\'email: ' . $e->getMessage(),
            ], 500);
        }
    }
}