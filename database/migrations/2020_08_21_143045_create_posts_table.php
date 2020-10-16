<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->text('body');
            $table->string('published')->default(1)->comment('1 published 0 draft');
            $table->integer('postcount')->nullable()->default(0)->comment('postviews');
            $table->boolean('isactive')->default(1)->comment('1 active 0 block');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
