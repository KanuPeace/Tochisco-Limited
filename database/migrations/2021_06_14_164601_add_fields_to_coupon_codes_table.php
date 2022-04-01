<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupon_codes', function (Blueprint $table) {
            if (!Schema::hasColumn('coupon_codes', 'price')) {
                $table->double('price' , 12 , 2)->after("used_on");
            }
            if (!Schema::hasColumn('coupon_codes', 'expires_at')) {
                $table->dateTime('expires_at')->nullable()->after("used_on");
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_codes', function (Blueprint $table) {
            if (Schema::hasColumn('coupon_codes', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('coupon_codes', 'expires_at')) {
                $table->dropColumn('expires_at');
            }
        });
    }
}
