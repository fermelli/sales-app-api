<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nit', 16);
            $table->string('establishment_name', 64);
            $table->string('address', 48);
            $table->string('phone', 16);
            $table->string('cellphone', 16)->nullable();
            $table->string('city', 32)->nullable();
            $table->string('footer_of_invoices', 255)->nullable();
            $table->string('path_for_backup', 255);
            $table->unsignedDecimal('exchange_rate', 8, 4);
            $table->unsignedDecimal('tax_percentage', 5, 4);
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
        Schema::dropIfExists('configurations');
    }
}
