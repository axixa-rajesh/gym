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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string("member_name");
            $table->string("plan_id");
            $table->string("plan_name");
            $table->string("duration");
            $table->float("plan_fees");
            $table->float("plan_discount")->nullable();
            $table->float("extradiscount")->nullable();
            $table->float("feessubmited");
            $table->date('dos')->nullable();
            $table->date('planexpiredate')->nullable();
            $table->enum('paymentmode', ['Cash', 'Online'])->default('Cash');
            $table->string("remark")->nullable();
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
        Schema::dropIfExists('payments');
    }
};
