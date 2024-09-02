<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFIIAccompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pfii_accomps', function (Blueprint $table) {
            $table->id();
            $table->date('activity_date');
            $table->string('site');
            $table->string('activity');
            $table->text('remarks');
            $table->string('personels');
            $table->date('date_created');
            $table->string('created_by');
            $table->enum('is_active',['Y','N'])->default('Y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pfii__accomps');
    }
}
