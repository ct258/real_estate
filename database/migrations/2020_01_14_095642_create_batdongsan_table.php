<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatdongsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('batdongsan')) {
            Schema::create('batdongsan', function (Blueprint $table) {
                $table->bigIncrements('bds_id')->comment('id của bất động sản');
                $table->string('bds_ten', 50)->comment('tên bất động sản');
                $table->string('bds_dientich', 30)->comment('diện tích bất động sản');
                $table->string('bds_gia', 15)->comment('giá bất động sản');
                $table->string('bds_mota')->comment('mô tả bất động sản');
                $table->string('bds_loaidat', 30)->comment('loại đất bất động sản');
                $table->string('bds_diachi', 50)->comment('địa chỉ bất động sản');

                $table->integer('loaibds_id')->index()->unsigned()->comment('tên loại bất động sản');

                $table->foreign('loaibds_id')->references('loaibds_id')->on('loaibds');
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
            DB::statement("ALTER TABLE `batdongsan` comment 'Bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
