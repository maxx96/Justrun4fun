<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->integer('points');
        });

        DB::table('categories')->insert([
            ['id' =>  1, 'name' => 'Maraton', 'points' => 100],
            ['id' =>  2, 'name' => 'Półmaraton', 'points' => 70],
            ['id' =>  3, 'name' => '10 km', 'points' => 50],
            ['id' =>  4, 'name' => '5 km', 'points' => 30],
            ['id' =>  5, 'name' => 'parkrun', 'points' => 15]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
