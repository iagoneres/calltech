<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->string('postal_code', 8);
            $table->string('street', 300);
            $table->integer('number')->nullable();
            $table->string('neighborhood', 200);
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('country', 2)->default('BR');
            $table->string('complement')->nullable();

            $table->timestamps();
            $table->softDeletes()
            ;
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
