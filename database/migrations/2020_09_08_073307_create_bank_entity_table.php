<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_entity', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('bank_id');
            $table->unsignedSmallInteger('entity_id');
            $table->string('account_number', 24);
            $table->timestamps();

            $table->foreign('bank_id')
                    ->references('id')
                    ->on('banks')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('entity_id')
                    ->references('id')
                    ->on('entities')
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
        Schema::dropIfExists('bank_entity');
    }
}
