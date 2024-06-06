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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("name");
            $table->string("mobile",10);
            $table->date("dob")->nullable();
            $table->string("email")->nullable();
            $table->enum('gender',['Male','Female'])->default('Male');
            $table->longText('address')->nullable();
            $table->float("height")->nullable();
            $table->float('weight')->nullable();
            $table->date('doj')->nullable();
            $table->enum('status', ['Activate', 'Deactivate'])->default('Activate');
            
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
        Schema::dropIfExists('members');
    }
};
