<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiletypeToThemeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme_sliders', function (Blueprint $table) {
            $table->string('fileType')->nullable()->after('id');
            $table->boolean('isActive')->default(true)->after('fileType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theme_sliders', function (Blueprint $table) {
            $table->dropColumn('fileType');
            $table->dropColumn('isActive');
        });
    }
}
