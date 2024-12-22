<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add role column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user'])->default('user'); // 'admin' or 'user'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove the role column if the migration is rolled back
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}