<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtScheduleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_schedule_details', function (Blueprint $table) {
            $table->id();
            $table->integer("case_year");
            $table->string("case_no");
            $table->string("case_desc");
            $table->integer("order");
            $table->unsignedBigInteger('court_schedule_header_id');
            $table->unsignedBigInteger('created_by');
            $table->boolean("schedule_status_id")->default(0);
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
        Schema::dropIfExists('court_schedule_details');
    }
}
