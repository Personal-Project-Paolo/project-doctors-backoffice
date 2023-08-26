<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('users');

        foreach ($users as $arrUsers){
            $user = User::create([
               
                "email"            => $arrUsers ['email'],
                "password"         => $arrUsers ['password'],
                "name"             => $arrUsers ['name'],
                "lastname"         => $arrUsers ['lastname'],
                "address"          => $arrUsers ['address'],
                "telephone"        => $arrUsers ['telephone'],
                "curriculum-vitae" => $arrUsers ['curriculum-vitae'],
                "name"             => $arrUsers ['name'],
                "image"            => $arrUsers ['image'],
                "performance"      => $arrUsers ['performance'],
                "promotion_counter"=> $arrUsers ['promotion_counter'],
                
            ]);
            $user->promotions()->sync($arrUsers['promotions']);
            $user->specializations()->sync($arrUsers['specializations']);
        }
        
    }
}
