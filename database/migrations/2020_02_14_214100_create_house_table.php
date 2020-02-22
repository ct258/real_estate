<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('house')) {
            Schema::create('house', function (Blueprint $table) {
                $table->increments('house_id')->comment('id của nhà');
                $table->integer('house_facade')->unsigned()->nullable()->index()->comment('mặt tiền (m)');
                $table->integer('house_way')->unsigned()->nullable()->index()->comment('lỗi vào (m)');
                $table->integer('house_floor')->unsigned()->nullable()->index()->comment('số tầng');
                $table->integer('house_bedroom')->unsigned()->nullable()->index()->comment('số phòng ngủ');
                $table->integer('house_toilet')->unsigned()->nullable()->index()->comment('số toilet');
                $table->integer('house_furniture')->unsigned()->nullable()->index()->comment('nội thất');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('direction_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
                $table->foreign('direction_id')->references('direction_id')->on('direction');
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
            DB::statement("ALTER TABLE `house` comment 'Nhà ở'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('house');
    }
}
