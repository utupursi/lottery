<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('prize_id');
            $table->integer('count');

            $table->foreign('prize_id')
                ->references('id')
                ->on('prizes');
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
        Schema::dropIfExists('prize_counts');
    }
}
