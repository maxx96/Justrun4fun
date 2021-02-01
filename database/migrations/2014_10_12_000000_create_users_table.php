<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->unsigned()->index()->default(2);
            $table->integer('photo_id')->default(1);
            $table->integer('foundation_id')->unsigned()->index()->nullable();
            $table->integer('age_category_id')->unsigned()->index()->nullable();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->integer('is_active')->default(0);
            $table->string('firstname', 20)->nullable();
            $table->string('surname', 20)->nullable();
            $table->string('city', 30)->nullable();
            $table->integer('total_points')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
