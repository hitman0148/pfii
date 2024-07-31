<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFIIMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pfii__members', function (Blueprint $table) {
            $table->id();
            $table->string('id_no');
            $table->string('fname');
            $table->string('lname');
            $table->string('mi');
            $table->date('bday');
            $table->string('gender');
            $table->string('civil_stat');
            $table->text('address');
            $table->date('date_joined');
            $table->date('date_expiration');
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
        Schema::dropIfExists('pfii__members');
    }
}
