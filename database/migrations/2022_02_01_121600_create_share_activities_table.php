<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('share_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users");
            $table->foreignId('sharer_id')->constrained("users")->nullable();
            $table->foreignId('post_id')->constrained("posts");
            $table->string('referrer_url')->nullable();
            $table->string('platform')->nullable();
            $table->string('domain')->nullable();
            $table->double("bonus")->default(0);
            $table->tinyInteger("is_sponsored")->default(0);
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
        Schema::dropIfExists('share_activities');
    }
}
