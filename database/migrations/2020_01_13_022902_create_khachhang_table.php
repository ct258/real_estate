<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('khachhang')) {
            Schema::create('khachhang', function (Blueprint $table) {
                $table->bigIncrements('kh_id')->comment('id của khách hàng');
                $table->string('kh_hoten')->comment('họ và tên khách hàng');
                $table->date('kh_ngaysinh')->comment('ngày sinh');
                $table->string('kh_sdt', 15)->comment('số điện thoại');
                $table->string('kh_diachi')->comment('địa chỉ');
                $table->string('kh_cmnd', 9)->comment('số chứng minh nhân dân');
                $table->date('kh_ngaycap')->comment('ngày cấp cmnd');
                $table->string('kh_noicap')->comment('nơi cấp cmnd');

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
                $table->unique(['kh_sdt', 'kh_cmnd']);
            });
            DB::statement("ALTER TABLE `khachhang` comment 'Khách hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
