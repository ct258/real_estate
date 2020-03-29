<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('about')) {
            Schema::create('about', function (Blueprint $table) {
                $table->increments('about_id')->comment('id thông tin công ty');
                $table->string('about_code')->index()->comment('tên thông tin');

                //foreign key
                $table->integer('staff_id')->index()->unsigned();

                $table->foreign('staff_id')->references('staff_id')->on('staff');
                //log time
                
            });
            DB::statement("ALTER TABLE `about` comment 'Thông tin công ty'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('about');
    }
}
