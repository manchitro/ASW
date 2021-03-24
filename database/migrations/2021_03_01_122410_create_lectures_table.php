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
            $table->string('classtype');
            $table->smallInteger('starttime');
            $table->smallInteger('endtime');
            $table->string('room');
            $table->string('qrcode')->nullable();
            $table->datetime('qrstart')->nullable();
            $table->datetime('qrend')->nullable();
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
