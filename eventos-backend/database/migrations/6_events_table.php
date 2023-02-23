<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('hall_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('organizer_id');
            $table->string('name');
            $table->text('description');
            $table->date('date');

            $table->foreign('hall_id')->references('id')->on('halls');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('organizer_id')->references('id')->on('organizers');

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
        Schema::dropIfExists('events');
    }
};
