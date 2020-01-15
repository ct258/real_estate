<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('chitietbds')){

            Schema::create('chitietbds', function (Blueprint $table) {
                $table->bigIncrements('ctbsd_id');
                $table->string('ctbsd_ten', 100)->comment('tên của BĐS');
                $table->string('ctbsd_gia', 50)->comment('giá BĐS');
                $table->string('ctbsd_dientich',20)->comment('diện tích BĐS');
                $table->string('ctbsd_diachi', 20)->comment('địa chỉ BĐS');
                $table->string('ctbsd_loaidat',20)->comment('loại đất BĐS');

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

            DB::statement("ALTER TABLE `chitietbds` comment 'Chi tiết BĐS'");
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
