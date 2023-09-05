<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchString = $request->query('q', '');

        $users = User::with('specializations', 'doctor')->where('name', 'LIKE', "%{$searchString}%")->paginate(100);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function show($slug)
    {
        $user = User::with('specializations', 'doctor')->where('slug', $slug,)->first();

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }
}
