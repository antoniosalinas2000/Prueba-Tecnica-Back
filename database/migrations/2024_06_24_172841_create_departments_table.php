<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level');
            $table->integer('employee_count');
            $table->string('ambassador_name')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
