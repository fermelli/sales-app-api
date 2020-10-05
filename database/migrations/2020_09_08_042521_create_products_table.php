<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('subcategory_id');
            $table->unsignedTinyInteger('unit_id')->nullable();
            $table->string('code', 72)->unique();
            $table->string('name', 128)->unique();
            $table->unsignedSmallInteger('stock')->default(0);
            $table->unsignedDecimal('sale_price', 8, 4);
            $table->unsignedDecimal('purchase_price', 8, 4);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('subcategory_id')
                    ->references('id')
                    ->on('subcategories')
                    ->onDelete('no action')
                    ->onDelete('cascade');
            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units')
                    ->onDelete('set null')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
