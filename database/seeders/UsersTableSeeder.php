<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$FZ2D2dKtP/VG4xyDabQTHOcgpKFFRnBF04Oj3wx6mTp/rIrQSSHsG',
                'is_admin' => 1,
                'current_company' => 1,
                'home_company' => 1,
                'remember_token' => NULL,
                'active' => 1,
                'password_expired' => 0,
                'password_expiry_date' => '2022-01-11',
                'never_expire' => 0,
                'invalid_logins' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-01-11 21:31:13',
            ),
        ));
        
        
    }
}