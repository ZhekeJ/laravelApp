<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordExpiredToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->after('remember_token')->default(false);
            $table->boolean('password_expired')->after('active')->default(true);
            $table->date('password_expiry_date')->after('password_expired')->nullable();
            $table->boolean('never_expire')->after('password_expiry_date')->default(false);
            $table->boolean('invalid_logins')->after('never_expire')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
