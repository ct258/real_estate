<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('street')) {
            Schema::create('street', function (Blueprint $table) {
                $table->increments('street_id');
                $table->string('street_name')->index();
                $table->string('street_prefix')->index();

                //foreign key
                $table->integer('district_id')->index()->unsigned();
                $table->integer('province_id')->index()->unsigned();

                $table->foreign('district_id')->references('district_id')->on('district');
                $table->foreign('province_id')->references('province_id')->on('province');
                //log time
                $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('ngày tạo');

                $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                ->nullable()
                ->comment('ngày xóa tạm');
            });
            DB::statement("ALTER TABLE `street` comment 'Đường phố'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('street');
    }
}
