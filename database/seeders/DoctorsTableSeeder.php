<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
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
            $slug = Doctor::slugger($arrDoctors['name']);

            $doctor = Doctor::create([

                "user_id"           => $arrDoctors ['user_id'],
                "name"              => $arrDoctors ['name'],
                "slug"              => $slug,
                "telephone"         => $arrDoctors ['telephone'],
                "curriculum_vitae"  => $arrDoctors ['curriculum_vitae'],
                "image"             => $arrDoctors ['image'],
                "performance"       => $arrDoctors ['performance'],
                "promotion_counter" => count($arrDoctors["promotions"]),

            ]);
            $doctor->promotions()->sync($arrDoctors['promotions']);

        }
    }
}
