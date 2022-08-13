<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array(
            0 =>
            array(
                'id' => 1,
                'company_id' => 1,
                'key' => 'company.name',
                'value' => 'Default Company',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

            1 =>
            array(
                'id' => 3,
                'company_id' => 1,
                'key' => 'company.email',
                'value' => 'admin@admin.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
