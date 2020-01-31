<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('taikhoan')) {
            Schema::create('taikhoan', function (Blueprint $table) {
                $table->Increments('tk_id')->comment('id của tài khoản');
                $table->string('username')->comment('tên tài khoản');
                $table->string('password')->comment('mật khẩu');
                $table->longText('remember_token')->nullable()->comment('Ghi nhớ đăng nhập');

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

                $table->unique(['tk_taikhoan', 'tk_matkhau']);
            });
            DB::statement("ALTER TABLE `taikhoan` comment 'Tài khoản'");
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
