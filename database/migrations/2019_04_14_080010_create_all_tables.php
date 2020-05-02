<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('body_en')->nullable();
            $table->text('body_ar')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('body_en')->nullable();
            $table->text('body_ar')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('additions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('owner_en')->nullable();
            $table->text('owner_ar')->nullable();
            $table->string('owner_image')->nullable();
            $table->text('taif_en')->nullable();
            $table->text('taif_ar')->nullable();
            $table->string('taif_image')->nullable();

            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body_en')->nullable();
            $table->text('body_ar')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });


        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('body_en')->nullable();
            $table->text('body_ar')->nullable();
            $table->string('price')->nullable();
            $table->string('offer')->nullable();
            $table->boolean('is_new')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
        });




        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('slides');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('additions');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('galleries');
    }
}
