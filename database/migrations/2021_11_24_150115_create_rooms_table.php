<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('room_number');
            $table->string('type_of_room');
            $table->decimal('money_per_week');
            $table->smallInteger('count_of_desks');
            $table->string('room_manager');
            $table->smallInteger('id_of_room_manager');
            //$table->smallInteger('client', [100]);
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
        Schema::dropIfExists('rooms');
    }
}
