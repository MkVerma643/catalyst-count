<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_table', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueNo');
            $table->string('name');
            $table->string('domain');
            $table->string('year founded');
            $table->string('industry');
            $table->string('size range');
            $table->string('locality');
            $table->string('country');
            $table->string('linkedin url');
            $table->string('current employee');
            $table->string('total employee estimate');
            // Add more columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_table');
    }

};
