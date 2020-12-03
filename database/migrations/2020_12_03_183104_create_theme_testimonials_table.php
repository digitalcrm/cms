<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('user name');
            $table->string('quote')->nullable()->comment('his quote about your product');
            $table->string('profile_url')->nullable()->comment('his profile');
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
        Schema::dropIfExists('theme_testimonials');
    }
}
