<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(5);

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
    }


    public function show(Message $message)
    {
        //
    }
}
