<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('location')->nullable();

            $table->string('face')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('snap')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
