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
            $table->integer('am0');
            $table->integer('am1');
            $table->integer('am2');
            $table->integer('am3');
            $table->integer('am4');
            $table->integer('am5');
            $table->integer('am6');
            $table->integer('am7');
            $table->integer('am8');
            $table->integer('am9');
            $table->integer('am10');
            $table->integer('am11');
            $table->integer('pm12');
            $table->integer('pm13');
            $table->integer('pm14');
            $table->integer('pm15');
            $table->integer('pm16');
            $table->integer('pm17');
            $table->integer('pm18');
            $table->integer('pm19');
            $table->integer('pm20');
            $table->integer('pm21');
            $table->integer('pm22');
            $table->integer('pm23');
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
