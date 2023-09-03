<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('specializations', 'doctor')->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $user,
        ]);    
    }
}
