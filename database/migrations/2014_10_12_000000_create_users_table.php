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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('job')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('content')->nullable()->default(null);
            $table->string('image_url')->nullable(); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        $table->dropColumn('image');
    }
};
