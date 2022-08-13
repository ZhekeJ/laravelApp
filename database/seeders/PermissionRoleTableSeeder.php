<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 1,
                'permission_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 1,
                'permission_id' => 4,
            ),
            4 => 
            array (
                'role_id' => 1,
                'permission_id' => 5,
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_id' => 6,
            ),
            6 => 
            array (
                'role_id' => 1,
                'permission_id' => 7,
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_id' => 8,
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_id' => 9,
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_id' => 10,
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_id' => 11,
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_id' => 13,
            ),
            12 => 
            array (
                'role_id' => 2,
                'permission_id' => 1,
            ),
            13 => 
            array (
                'role_id' => 2,
                'permission_id' => 4,
            ),
            14 => 
            array (
                'role_id' => 2,
                'permission_id' => 3,
            ),
            15 => 
            array (
                'role_id' => 2,
                'permission_id' => 14,
            ),
            16 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_id' => 12,
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_id' => 15,
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_id' => 17,
            ),
            20 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
            ),
            21 => 
            array (
                'role_id' => 1,
                'permission_id' => 16,
            ),
            22 => 
            array (
                'role_id' => 1,
                'permission_id' => 19,
            ),
            23 => 
            array (
                'role_id' => 3,
                'permission_id' => 19,
            ),
        ));
        
        
    }
}