<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password', 60);
            $table->string('api_key', 32)->unique();
            $table->integer('empleado_id')->unsigned()->index();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade')->on_update('cascade');
            $table->integer('rol_id')->unsigned()->index();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::drop('users');
    }
}