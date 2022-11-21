<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
           $table->boolean('private')->default(false);
           $table->integer('low_mark')->default(3);
           $table->integer('midle_mark')->default(5);
           $table->integer('high_mark')->default(8);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
          $table->dropColumn(['private', 'low_mark', 'midle_mark', 'high_mark']);
        });
    }
};
