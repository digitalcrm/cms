<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->comment('event title');
            $table->foreignId('user_id')->constrained()->comment('treated as consultant');
            $table->foreignId('booking_service_id')->constrained()->comment('booking_services table id');
            $table->datetime('event_start');
            $table->datetime('event_end');
            $table->longText('event_description')->nullable()->comment('add note related to event');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_events');
    }
}
