<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chitietbds')) {
            Schema::create('chitietbds', function (Blueprint $table) {
                $table->bigIncrements('ctbds_id')->comment('id của bất động sản');
                $table->string('ctbds_ten', 50)->comment('tên bất động sản');
               $table->string('ctbds_dientich', 30)->comment('diện tích bất động sản');
               $table->string('ctbds_gia', 15)->comment('giá bất động sản');
               $table->string('ctbds_mota')->comment('mô tả bất động sản');
               $table->string('ctbds_loaidat', 30)->comment('loại đất bất động sản');
               $table->string('ctbds_diachi', 50)->comment('địa chỉ bất động sản');
                

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
            DB::statement("ALTER TABLE `ctbds` comment 'Chi tiết bất động sản'");
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
