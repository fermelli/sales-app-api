<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('entityable_type', 32);
            $table->unsignedSmallInteger('entityable_id');
            $table->string('ci_nit', 16)->unique();
            $table->string('address', 48)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('cellphone', 16)->nullable();
            $table->string('email', 48)->nullable()->unique();
            $table->timestamps();

            $table->index(['entityable_type', 'entityable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
