<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nhanvien')) {
            Schema::create('nhanvien', function (Blueprint $table) {
                $table->bigIncrements('nv_id')->comment('id của khách hàng');
                $table->string('nv_ma')->comment('họ và tên khách hàng');
                $table->string('nv_nv')->comment('họ tên nhân viên');
                $table->string('nv_ten')->comment('họ tên nhân viên');
                $table->date('nv_ngaysinh')->comment('ngay sinh nhân viên');
                $table->integer('nv_gioitinh')->unsigned()->comment('giới tính nhân viên');
                $table->string('nv_sdt', 12)->comment('số điện thoại nhân viên');
                $table->string('nv_diachi')->comment('địa chỉ nhân viên');

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
            DB::statement("ALTER TABLE `nhanvien` comment 'Nhân viên'");
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
