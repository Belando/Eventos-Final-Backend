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

            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->text('type');

            $table->unsignedBigInteger('hall_id');
            $table->foreign('hall_id')
            ->references('id')
            ->on('halls');

            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')
            ->references('id')
            ->on('tickets');

            $table->unsignedBigInteger('organizer_id');
            $table->foreign('organizer_id')
            ->references('id')
            ->on('organizers');


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
