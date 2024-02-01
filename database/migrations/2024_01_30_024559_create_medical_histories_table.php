<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('sphere')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('axis')->nullable();
            $table->string('va')->nullable();
            $table->string('add_or_va')->nullable();
            $table->string('remarks')->nullable();
            $table->string('user_id')->nullable();
            $table->string('appointment_id')->nullable();
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
        Schema::dropIfExists('medical_histories');
    }
}
