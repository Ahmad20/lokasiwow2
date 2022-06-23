<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title');
            $table->string('location');
            $table->text('image_link')->nullable();
            $table->float('rating_score');
            $table->integer('rating_count')->nullable()->default(0);
            // $table->integer('count_like');
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('app/post1.sql'));
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
};
