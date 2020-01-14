<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('duan')) {
            Schema::create('duan', function (Blueprint $table) {
                $table->bigIncrements('da_id')->comment('id của dự án');
                $table->string('da_ten')->comment('tên dự án');
                $table->string('da_gia')->comment('giá dự án');
                $table->string('da_diachi', 50)->comment('địa chỉ dự án');
                $table->string('da_dientich',10)->comment('diện tích dự án');
                $table->string('da_trangthai', 10)->comment('trạng thái dự án');
                $table->string('da_mota')->comment('mô tả dự án');
                

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
            DB::statement("ALTER TABLE `duan` comment 'Dự án'");
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
