<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('booking_customer_booking_event', function (Blueprint $table) {
            $table->foreignId('booking_customer_id')->constrained();
            $table->foreignId('booking_event_id')->constrained();
            $table->dateTime('booking_date');
            $table->longText('description');
            $table->unique(['booking_customer_id', 'booking_event_id'],'customer_event_index_unique');
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
        Schema::dropIfExists('booking_customers');
    }
}
