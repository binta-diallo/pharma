<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       //je créé les identifiants de l'admin pour la gestion des publications.
       
        $admin=User::create([

          "name"=>"mohamed",
          "email"=>"diallosantepro@yahoo.fr",
          "password"=>Hash::make('diallosantepro@yahoo.fr'),
          "role"=>"admin"


        ]);
    }
}
