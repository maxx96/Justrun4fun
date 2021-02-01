<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
        });

        DB::table('age_categories')->insert([
            ['id' =>  1, 'name' => 'K-20'],
            ['id' =>  2, 'name' => 'K-30'],
            ['id' =>  3, 'name' => 'K-40'],
            ['id' =>  4, 'name' => 'K-50'],
            ['id' =>  5, 'name' => 'M-20'],
            ['id' =>  6, 'name' => 'M-30'],
            ['id' =>  7, 'name' => 'M-40'],
            ['id' =>  8, 'name' => 'M-50']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_categories');
    }
}
