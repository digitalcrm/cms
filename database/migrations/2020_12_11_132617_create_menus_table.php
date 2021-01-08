<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('page_id')->nullable()->constrained();
            $table->string('placed_in')->nullable();
            $table->string('sort_order')->nullable();
            $table->boolean('isActive')->default(true)->comment('for active inactive menu');
            $table->string('url')->nullable();
            $table->boolean('isChecked')->default(false)->comment('is used for target blank');
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
        Schema::dropIfExists('menus');
    }
}
