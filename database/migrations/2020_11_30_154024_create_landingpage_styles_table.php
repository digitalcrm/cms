<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingpageStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landingpage_styles', function (Blueprint $table) {
            $table->id();
            $table->string('body_background_color')->nullable();
            $table->string('nav_head_color')->nullable();
            $table->string('firstfootercolor')->nullable();
            $table->string('secondfootercolor')->nullable();
            $table->string('a_tag_color')->nullable();
            $table->string('a_tag_hover_color')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('h2_tag_color')->nullable();
            $table->string('stats_back_color')->nullable();
            $table->string('team_back_color')->nullable();
            $table->string('client_back_color')->nullable();
            $table->string('background_image')->nullable();
            $table->tinyInteger('backgroundstatus')->nullable();
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('landingpage_styles');
    }
}
