<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('ward')) {
            Schema::create('ward', function (Blueprint $table) {
                $table->increments('ward_id');
                $table->string('ward_name')->index();
                $table->string('ward_prefix')->index();

                //foreign key
                $table->integer('district_id')->index()->unsigned();
                // $table->integer('province_id')->index()->unsigned();

                $table->foreign('district_id')->references('district_id')->on('district');
                // $table->foreign('province_id')->references('province_id')->on('province');
                //log time

            });
            DB::statement("ALTER TABLE `ward` comment 'Phường xã'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('ward');
    }
}
