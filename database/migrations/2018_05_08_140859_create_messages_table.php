<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discussion_id')->unsigned();
            $table->integer('sender_id')->unsigned();
            $table->text('context');
            $table->boolean('seen')->default(false);
            $table->timestamps();
            $table->foreign('discussion_id')->references('id')->on('discussions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
