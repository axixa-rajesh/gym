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
        Schema::create('imgtables', function (Blueprint $table) {
            $table->id();
            
            $table->string("title");
            $table->string("image");
            $table->text("description")->nullable();
            $table->enum('headerimage', ['yes', 'no'])->default('no');
            $table->enum('backgroundimage', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('imgtables');
    }
};
