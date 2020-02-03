<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiethinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chitiethinhanh')) {
            Schema::create('chitiethinhanh', function (Blueprint $table) {
                $table->bigIncrements('ctha_id');
                $table->string('ctha_mota')->commnet('mô tả hình ảnh là ảnh đại diện hay ảnh thường');

                $table->integer('bds_id')->index()->unsigned()->comment('id bất động sản');
                $table->integer('ha_id')->index()->unsigned()->comment('id hình ảnh');

                $table->foreign('bds_id')->references('bds_id')->on('batdongsan');
                $table->foreign('ha_id')->references('ha_id')->on('hinhanh');
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
                // Setting unique
                //sdt và cmnd không được trùng
            });

            DB::statement("ALTER TABLE `chitiethinhanh` comment 'chi tiết hình ảnh'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('chitiethinhanh');
    }
}
