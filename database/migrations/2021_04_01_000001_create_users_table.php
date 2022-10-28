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
            $table->string('name',100);
            $table->string('email', 100)->unique();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('rg', 20)->nullable();
            $table->tinyInteger('genre')->nullable();
            $table->date('birthday')->nullable();
            $table->string('contact', 14)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('complement', 200)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('course', 100)->nullable();
            $table->string('institution', 100)->nullable();
            $table->string('profession', 100)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('photo')->nullable();
            $table->text('background')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('password');
            $table->text('description')->nullable();
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
