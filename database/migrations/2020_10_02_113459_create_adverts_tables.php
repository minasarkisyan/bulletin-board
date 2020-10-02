<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_adverts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('advert_categories');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->string('title');
            $table->integer('price');
            $table->text('address');
            $table->text('content');
            $table->string('status', 16);
            $table->text('reject_reason')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });

        Schema::create('advert_advert_values', function (Blueprint $table) {
            $table->unsignedBigInteger('advert_id');
            $table->foreign('advert_id')->references('id')->on('advert_adverts')->onDelete('CASCADE');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('CASCADE');
            $table->string('value');
            $table->primary(['advert_id', 'attribute_id']);
        });

        Schema::create('advert_advert_photos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('advert_id');
            $table->foreign('advert_id')->references('id')->on('advert_adverts')->onDelete('CASCADE');
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert_advert_photos');
        Schema::dropIfExists('advert_advert_values');
        Schema::dropIfExists('advert_adverts');
    }
}
