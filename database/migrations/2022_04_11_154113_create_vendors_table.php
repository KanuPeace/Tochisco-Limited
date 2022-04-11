<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->nullable();
            $table->foreignId('logo_id')->on("files")->nullable();
            $table->string('business_name' , 100)->unique();
            $table->string('business_address' , 100)->unique();
            $table->string('business_email' , 100);
            $table->string('phone');
            $table->string('status')->default("Approved");
            $table->string('pin')->nullable();
            $table->string('payment_ref')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
