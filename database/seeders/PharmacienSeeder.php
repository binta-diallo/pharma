<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pharmaciens')->insert([
            'nom' =>'Djoussa Sylvie',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic7.jpg',
        ]);
         
        DB::table('pharmaciens')->insert([
            'nom' =>'Severine Coulon',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic1.jpg',
        ]);

        DB::table('pharmaciens')->insert([
            'nom' =>'Sandra Fernandes',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic.jpg',
        ]);

        DB::table('pharmaciens')->insert([
            'nom' =>'Riad Boumadani',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic2.jpg',
        ]);
        
        DB::table('pharmaciens')->insert([
            'nom' =>'Cathérine Cuvelier',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic6.jpg',
        ]);
        
        DB::table('pharmaciens')->insert([
            'nom' =>'Napoléon Tuyindi',
            'metier' =>'pharmacien',
            'photo' =>'pharmapic3.jpg',
        ]);
        
        




    }
}
