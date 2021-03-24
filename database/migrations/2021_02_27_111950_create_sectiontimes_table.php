<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectiontimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectiontimes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sectionid');
            $table->string('classtype');
            $table->smallInteger('starttime');
            $table->smallInteger('endtime');
            $table->smallInteger('weekday');
            $table->string('room');
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
        Schema::dropIfExists('sectiontimes');
    }
}
