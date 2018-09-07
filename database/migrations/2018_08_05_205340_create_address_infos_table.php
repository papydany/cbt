<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
             $table->string('phone');
              $table->string('phone1')->nullable();
            $table->string('email1');
             $table->string('email2')->nullable();
            $table->text('address')->nullable();
        
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
        Schema::dropIfExists('address_infos');
    }
}
