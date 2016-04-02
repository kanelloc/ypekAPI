<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_measures', function(Blueprint $table){
            $table->increments('id');
            $table->string('fileName');
            $table->integer('station_id')->unsigned();

            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            
            $table->integer('year');
            $table->string('type');
            $table->date('date');
            $table->integer('00');
            $table->integer('01');
            $table->integer('02');
            $table->integer('03');
            $table->integer('04');
            $table->integer('05');
            $table->integer('06');
            $table->integer('07');
            $table->integer('08');
            $table->integer('09');
            $table->integer('10');
            $table->integer('11');
            $table->integer('12');
            $table->integer('13');
            $table->integer('14');
            $table->integer('15');
            $table->integer('16');
            $table->integer('17');
            $table->integer('18');
            $table->integer('19');
            $table->integer('20');
            $table->integer('21');
            $table->integer('22');
            $table->integer('23');
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
        Schema::drop('station_measures');
    }
}
