<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customes', function (Blueprint $table) {
            $table->increments('id_cus');
            $table->string('name_cus');
            $table->string('addse_cus');
            $table->string('email_cus');
            $table->string('phone_cus');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customes');
    }
}
