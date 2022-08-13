<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'domain' => NULL,
                'active' => 1,
                'created_at' => '2022-01-11 07:21:34',
                'updated_at' => '2022-01-11 07:21:34',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}