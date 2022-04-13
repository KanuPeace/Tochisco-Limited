<?php

use App\Constants\StatusConstants;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('payment_id')->index()->nullable();
            $table->foreignId('plan_id')->constrained("plans");
            $table->double('price' , 12 , 2);
            $table->float('referral_bonus')->default(0);
            $table->string('payment_method');
            $table->dateTime('paid_on')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->string('status')->default(StatusConstants::PENDING);
            $table->foreign('user_id')->on("users")->references("id");
            // $table->foreign('payment_id')->on("payments")->references("id");
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
        Schema::dropIfExists('subscriptions');
    }
}
