<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUserIdNullableInNewsItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_items', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change();  // Make user_id nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_items', function (Blueprint $table) {
            $table->integer('user_id')->nullable(false)->change();  // Make user_id non-nullable if rolled back
        });
    }
}
