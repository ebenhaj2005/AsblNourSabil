<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToNewsItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_items', function (Blueprint $table) {
            $table->string('image')->nullable();  // Add the 'image' column, allowing it to be nullable
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
            $table->dropColumn('image');  // Remove the 'image' column if the migration is rolled back
        });
    }
}
