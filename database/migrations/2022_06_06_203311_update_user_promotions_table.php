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
        Schema::table('user_promotions', function (Blueprint $table) {
            $table->dropForeign(['promotion_id']);

            $table->renameColumn('promotion_id','promotion_code_id');

            $table->foreign('promotion_code_id')->references('id')->on('promotion_codes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_promotions', function (Blueprint $table) {
            $table->dropForeign(['promotion_code_id']);

            $table->renameColumn('promotion_code_id','promotion_id');

            $table->foreign('promotion_id')->references('id')->on('promotion_codes')->cascadeOnDelete();
        });
    }
};
