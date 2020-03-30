<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('district')) {
            Schema::create('district', function (Blueprint $table) {
                $table->increments('district_id');
                $table->string('district_name')->index();
                $table->string('district_prefix')->index();

                //foreign key
                $table->integer('province_id')->index()->unsigned();

                $table->foreign('province_id')->references('province_id')->on('province');

            });
            DB::statement("ALTER TABLE `district` comment 'Quận huyện'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('district');
    }
}
