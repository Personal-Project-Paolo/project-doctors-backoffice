<?php

namespace App\Http\Controllers\Api;


use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchString = $request->query('q', '');

        $doctors = Doctor::with('promotions')->where('name', 'LIKE', "%{$searchString}%")->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $doctors,
        ]);
    }


    public function show($id)
    {
        //
    }
}
