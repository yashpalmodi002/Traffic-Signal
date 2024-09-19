<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence_a')->nullable()->comment('Sequence A No of Signal');
            $table->integer('sequence_b')->nullable()->comment('Sequence B No of Signal');
            $table->integer('sequence_c')->nullable()->comment('Sequence C No of Signal');
            $table->integer('sequence_d')->nullable()->comment('Sequence D No of Signal');
            $table->integer('green_light_intervals')->nullable()->comment('Green Light Interval');
            $table->integer('yellow_light_intervals')->nullable()->comment('Sequence of the Name');
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
        Schema::dropIfExists('signals');
    }
}
