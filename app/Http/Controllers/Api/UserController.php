<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('specializations')->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function show(User $user)
    {
        //
    }
}
