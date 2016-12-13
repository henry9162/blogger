<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likeable', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->nullable()->unsigned();
            $table->integer('post_id')->nullable()->unsigned();
            $table->integer('likeable_id')->nullable()->unsigned();
            $table->string('likeable_type')->nullable();
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
        Schema::dropIfExists('likeable');
    }
}
