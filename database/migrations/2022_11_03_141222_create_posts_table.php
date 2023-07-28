<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->date('date');
            $table->string('A1', 50)->nullable();
            $table->string('A2', 50)->nullable();
            $table->string('A3', 50)->nullable();
            $table->string('A4', 50)->nullable();
            $table->string('A5', 50)->nullable();
            $table->string('A6', 50)->nullable();
            $table->string('B1', 50)->nullable();
            $table->string('B2', 50)->nullable();
            $table->string('B3', 50)->nullable();
            $table->string('B4', 50)->nullable();
            $table->string('B5', 50)->nullable();
            $table->string('B6', 50)->nullable();
            $table->string('C1', 50)->nullable();
            $table->string('C2', 50)->nullable();
            $table->string('C3', 50)->nullable();
            $table->string('C4', 50)->nullable();
            $table->string('C5', 50)->nullable();
            $table->string('C6', 50)->nullable();
            $table->string('D1', 50)->nullable();
            $table->string('D2', 50)->nullable();
            $table->string('D3', 50)->nullable();
            $table->string('D4', 50)->nullable();
            $table->string('D5', 50)->nullable();
            $table->string('D6', 50)->nullable();
            $table->string('E1', 50)->nullable();
            $table->string('E2', 50)->nullable();
            $table->string('E3', 50)->nullable();
            $table->string('E4', 50)->nullable();
            $table->string('E5', 50)->nullable();
            $table->string('E6', 50)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
