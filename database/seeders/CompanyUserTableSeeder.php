<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanyUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_user')->delete();
        
        \DB::table('company_user')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'company_id' => 1,
            ),
            1 => 
            array (
                'user_id' => 3,
                'company_id' => 1,
            ),
            2 => 
            array (
                'user_id' => 4,
                'company_id' => 1,
            ),
        ));
        
        
    }
}