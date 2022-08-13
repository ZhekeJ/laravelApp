<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'read-global-dashboard',
                'display_name' => 'Read Global Dashboards',
                'created_at' => NULL,
                'updated_at' => '2022-01-09 21:40:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'read-auth-users',
                'display_name' => 'Read Auth Users',
                'created_at' => NULL,
                'updated_at' => '2022-01-09 21:25:48',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'read-auth-permissions',
                'display_name' => 'Read Auth Permission',
                'created_at' => NULL,
                'updated_at' => '2022-01-09 21:26:02',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'read-auth-roles',
                'display_name' => 'Read Auth Roles',
                'created_at' => NULL,
                'updated_at' => '2022-01-09 21:26:22',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'update-auth-users',
                'display_name' => 'Update Auth Users',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'update-auth-permissions',
                'display_name' => 'Update Auth Permission',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'update-auth-roles',
                'display_name' => 'Update Auth Roles',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'delete-auth-users',
                'display_name' => 'Delete Auth Users',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'delete-auth-permissions',
                'display_name' => 'Delete Auth Permission',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'delete-auth-roles',
                'display_name' => 'Delete Auth Roles',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'create-auth-users',
                'display_name' => 'Create Auth Users',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'create-auth-permissions',
                'display_name' => 'Create Auth Permission',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'create-auth-roles',
                'display_name' => 'Create Auth Roles',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'reading-settings-settings',
                'display_name' => 'Read Settings',
                'created_at' => NULL,
                'updated_at' => '2022-01-09 21:27:23',
                'deleted_at' => '2022-01-09 21:27:23',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'read-common-companies',
                'display_name' => 'Read Common Companies',
                'created_at' => '2022-01-10 22:37:38',
                'updated_at' => '2022-01-10 22:37:38',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'create-common-companies',
                'display_name' => 'Create Common Companies',
                'created_at' => '2022-01-11 07:20:18',
                'updated_at' => '2022-01-11 07:20:18',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'update-common-companies',
                'display_name' => 'Update Common Companies',
                'created_at' => '2022-01-11 07:20:41',
                'updated_at' => '2022-01-11 07:20:41',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'delete-common-companies',
                'display_name' => 'Delete Common Companies',
                'created_at' => '2022-01-11 07:21:03',
                'updated_at' => '2022-01-11 07:21:03',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'read-common-settings',
                'display_name' => 'Read Common Settings',
                'created_at' => '2022-01-11 17:06:17',
                'updated_at' => '2022-01-11 17:06:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}