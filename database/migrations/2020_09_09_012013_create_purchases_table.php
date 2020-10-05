<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('entity_id');
            $table->unsignedTinyInteger('nullifier_id')->nullable();
            $table->unsignedTinyInteger('purchaser_id');
            $table->unsignedMediumInteger('number');
            $table->string('invoice_number', 16);
            $table->date('invoice_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('is_in_cash')->default(true);
            $table->boolean('is_national_currency')->default(true);
            $table->unsignedDecimal('exchange_rate', 8, 4);
            $table->string('observations', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('annulation_timestamp', 0)->nullable();
            $table->timestamps();

            $table->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('nullifier_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('purchaser_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('purchases');
    }
}
