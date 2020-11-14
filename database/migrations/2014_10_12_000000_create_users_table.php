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
            $table->integer('foundation_id')->unsigned()->index()->default(1);
            $table->integer('photo_id')->default(1);
            $table->integer('is_active')->default(1);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->string('firstname', 20)->nullable();
            $table->string('surname', 20)->nullable();
            $table->string('sex', 15)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('category_age', 5)->nullable();
            $table->integer('total_points')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
