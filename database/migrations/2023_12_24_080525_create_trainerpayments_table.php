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
        Schema::create('trainerpayments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('member_id')->nullable();
                $table->string("member_name");
                $table->string("trainer_id");
                $table->string("trainer_name");
                $table->string("duration");
                $table->float("feessubmited");
                $table->date('dos')->nullable();
                $table->date('trainerdurationdate')->nullable();
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
        Schema::dropIfExists('trainerpayments');
    }
};
