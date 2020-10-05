<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedMediumInteger('sale_id');
            $table->unsignedSmallInteger('product_id');
            $table->unsignedInteger('purchase_detail_id');
            $table->smallInteger('quantity');
            $table->unsignedDecimal('sale_price', 8, 4);

            $table->foreign('sale_id')
                ->references('id')
                ->on('sales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('purchase_detail_id')
                ->references('id')
                ->on('purchase_details')
                ->onDelete('no action')
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
        Schema::dropIfExists('sale_details');
    }
}
