<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->id();
            $table->string('star_name');
            $table->string('website_date');
            $table->integer('total_fortune_score');
            $table->text('total_fortune_desc');
            $table->integer('love_fortune_score');
            $table->text('love_fortune_desc');
            $table->integer('career_fortune_score');
            $table->text('career_fortune_desc');
            $table->integer('wealth_fortune_score');
            $table->text('wealth_fortune_desc');
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
        Schema::dropIfExists('stars');
    }
}
