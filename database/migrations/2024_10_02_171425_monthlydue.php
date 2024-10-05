<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Monthlydue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlydue', function (Blueprint $table) {
            $table->id();
            $table->integer('mid');
            $table->string('date')->nullable();
            $table->string('amt')->nullable()->default('0');
            $table->dateTime('date_created');
            $table->string('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthlydue');
    }
}
