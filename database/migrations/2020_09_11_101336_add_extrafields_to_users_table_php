<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtrafieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('name')->nullable();
            $table->string('lastname')->after('firstname')->nullable();
            $table->text('profile_photo_path')->after('lastname')->nullable();
            $table->string('mobile_number',15)->after('remember_token')->nullable();
            $table->string('address')->after('mobile_number')->nullable();
            $table->longText('description')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('profile_photo_path');
            $table->dropColumn('mobile_number');
            $table->dropColumn('address');
            $table->dropColumn('description');
        });
    }
}
