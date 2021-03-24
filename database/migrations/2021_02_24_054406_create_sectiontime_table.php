<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectiontimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectiontime', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sectionid');
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
        Schema::dropIfExists('sectiontime');
    }
}
