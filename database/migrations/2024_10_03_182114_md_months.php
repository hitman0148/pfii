<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdMonths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_months',function(Blueprint $table){
            $table->id();
            $table->string('month',10);
            $table->string('year',4);
            $table->dateTime('date_created')->nullable();
            $table->string('created_by',150)->nullable();
            $table->enum('is_deleted',['N','Y'])->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('md_months');
    }
}
