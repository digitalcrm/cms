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
            $table->id()->startingValue(1000);
            $table->string('event_name')->comment('event title');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->comment('salesperson consultant user');
            $table->foreignId('booking_service_id')->nullable()->constrained()->comment('service type');
            $table->string('duration');
            $table->string('price')->default('0');
            $table->longText('event_description')->nullable()->comment('add note related to event');
            $table->datetime('event_start')->nullable()->comment('not used yet');
            $table->datetime('event_end')->nullable()->comment('not used yet');
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
