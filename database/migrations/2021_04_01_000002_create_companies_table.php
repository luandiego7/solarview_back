<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained();
            $table->string('social_name', 100);
            $table->string('fantasy_name', 100);
            $table->string('cnpj', 18)->unique();
            $table->string('email', 100)->nullable()->unique();
            $table->string('contact', 14)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement', 200)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('ie', 20)->nullable();
            $table->string('im', 20)->nullable();
            $table->string('site', 255)->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->datetime('last_update_at')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
