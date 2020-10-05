<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionals', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('product_id')->unique();
            $table->string('observations', 255)->nullable();
            $table->unsignedDecimal('wholesale_price', 8, 4)->nullable();
            $table->unsignedDecimal('dozen_price', 8, 4)->nullable();
            $table->unsignedDecimal('special_price', 8, 4)->nullable();
            $table->string('product_image_path', 255)->nullable();
            $table->string('product_image_path_1', 255)->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additionals');
    }
}
