<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sectionid');
            $table->date('date');
            $table->text('classtype');
            $table->smallInteger('starttime');
            $table->smallInteger('endtime');
            $table->smallInteger('weekday');
            $table->text('room');
            $table->text('qrcode');
            $table->datetime('qrstart');
            $table->datetime('qrend');
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
        Schema::dropIfExists('lectures');
    }
}