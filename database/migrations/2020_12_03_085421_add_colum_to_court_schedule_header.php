<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToCourtScheduleHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('court_schedule_headers', function (Blueprint $table) {
            $table->unsignedBigInteger('court_id')->nullable();
            $table->unsignedBigInteger('circut_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('court_schedule_headers', function (Blueprint $table) {
            //
        });
    }
}
