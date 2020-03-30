<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvenienceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('convenience')) {
            Schema::create('convenience', function (Blueprint $table) {
                $table->increments('convenience_id');
                $table->tinyInteger('convenience_facade')->unsigned()->index()->comment('mặt tiền (m)');
                $table->tinyInteger('convenience_way')->unsigned()->index()->comment('lối vào (m)');
                $table->tinyInteger('convenience_floor')->unsigned()->index()->comment('số tầng');
                $table->tinyInteger('convenience_bedroom')->unsigned()->index()->comment('số phòng ngủ');
                $table->tinyInteger('convenience_bathroom')->unsigned()->index()->comment('phòng tắm');
                $table->tinyInteger('convenience_air_conditioning')->unsigned()->nullable()->index()->comment('máy lạnh');
                $table->tinyInteger('convenience_BBQ_area')->unsigned()->nullable()->index()->comment('khu vực BBQ');
                $table->tinyInteger('convenience_CCTV')->unsigned()->nullable()->index()->comment('camera an ninh');
                $table->tinyInteger('convenience_concierge')->unsigned()->nullable()->index()->comment('người tiếp tân');
                $table->tinyInteger('convenience_fitness')->unsigned()->nullable()->index()->comment('phòng tập');
                $table->tinyInteger('convenience_garden')->unsigned()->nullable()->index()->comment('vườn cây');
                $table->tinyInteger('convenience_library')->unsigned()->nullable()->index()->comment('thư viện');
                $table->tinyInteger('convenience_mountain_view')->unsigned()->nullable()->index()->comment('view núi');
                $table->tinyInteger('convenience_parking')->unsigned()->nullable()->index()->comment('bãi xe');
                $table->tinyInteger('convenience_playground')->unsigned()->nullable()->index()->comment('sân chơi');
                $table->tinyInteger('convenience_ocean_view')->unsigned()->nullable()->index()->comment('view biển');
                $table->tinyInteger('convenience_security')->unsigned()->nullable()->index()->comment('bảo vệ');
                $table->tinyInteger('convenience_swimming_pool')->unsigned()->nullable()->index()->comment('hồ bơi');
                $table->tinyInteger('convenience_tennis')->unsigned()->nullable()->index()->comment('tennis');
                $table->tinyInteger('convenience_wifi')->unsigned()->nullable()->index()->comment('wifi');
                $table->tinyInteger('convenience_tivi')->unsigned()->nullable()->index()->comment('tivi');
                $table->tinyInteger('direction_code')->index()->unsigned()->comment('Phương hướng');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
                //log time
                // $table->timestamp('created_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP'))
                // ->comment('ngày tạo');

                // $table->timestamp('updated_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                // ->comment('ngày cập nhật');

                // $table->timestamp('deleted_at')
                // ->nullable()
                // ->comment('ngày xóa tạm');
            });
            DB::statement("ALTER TABLE `convenience` comment 'Tiện nghi'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('convenience');
    }
}
