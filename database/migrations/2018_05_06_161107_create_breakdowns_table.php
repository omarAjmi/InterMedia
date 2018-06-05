<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreakdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakdowns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('device_id')->unsigned();
            $table->string('title');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakdowns');
    }
}
