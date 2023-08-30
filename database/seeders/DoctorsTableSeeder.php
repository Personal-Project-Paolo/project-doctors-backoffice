<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = config('doctors');

        foreach ($doctors as $arrDoctors){
            $user = Doctor::create([
                
                "user_id"          => $arrDoctors ['user_id'],

                // "email"            => $arrDoctors ['email'],
                // "password"         => Hash::make('password'),
                // "name"             => $arrDoctors ['name'],
                // "lastname"         => $arrDoctors ['lastname'],
                // "address"          => $arrDoctors ['address'],
                "telephone"        => $arrDoctors ['telephone'],
                "curriculum_vitae" => $arrDoctors ['curriculum_vitae'],
                // "name"             => $arrDoctors ['name'],
                "image"            => $arrDoctors ['image'],
                "performance"      => $arrDoctors ['performance'],
                "promotion_counter"=> $arrDoctors ['promotion_counter'],
                
            ]);
            $user->promotions()->sync($arrDoctors['promotions']);
            // $user->specializations()->sync($arrDoctors['specializations']);
        }
    }
}
