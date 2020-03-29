<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('province')) {
            Schema::create('province', function (Blueprint $table) {
                $table->increments('province_id');
                $table->string('province_name')->index();
                $table->string('province_prefix')->index();

                
                
            });
            DB::statement("ALTER TABLE `province` comment 'Tỉnh thành'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('province');
    }
}
