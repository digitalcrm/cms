<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingActivityIdToBookingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_events', function (Blueprint $table) {
            $table->foreignId('booking_activity_id')->nullable()->constrained()->after('booking_service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_events', function (Blueprint $table) {
            $table->dropColumn('booking_activity_id');
        });
    }
}
