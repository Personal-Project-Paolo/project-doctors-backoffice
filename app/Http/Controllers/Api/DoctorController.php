<?php

namespace App\Http\Controllers\Api;


use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
   
    public function index()
    {
        $doctors = Doctor::with('promotions', 'messages', 'reviews')->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $doctors,
        ]);

        
    }


    public function show($slug)
    {
        $doctor = Doctor::with('promotions', 'messages', 'reviews')->where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $doctor,
        ]); 
    }
}
