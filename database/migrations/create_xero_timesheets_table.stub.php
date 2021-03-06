<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXeroTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('xero_timesheets', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('xerotimeable');
            $table->string('xero_timesheet_guid', 50)->nullable()->comment('The identifier provided by Xero');
            $table->string('xero_employee_id', 50)->nullable()->comment('Just saves having to do a lookup all the time');
            $table->string('status', 50)->default('DRAFT')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('hours', 8, 2)->default(0);
            $table->timestamp('synced_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xero_timesheets');
    }
}
