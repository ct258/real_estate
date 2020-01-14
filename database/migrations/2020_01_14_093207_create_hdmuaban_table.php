<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHdmuabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('hdmuaban')) {
            Schema::create('hdmuaban', function (Blueprint $table) {
                $table->bigIncrements('hdmb_id')->comment('id của hợp đồng');
                $table->string('hdmb_ma')->comment('mã của hợp đồng mua bán');
                $table->date('hdmb_ngayki')->comment('ngày kí hợp đồng');
                $table->string('hdmb_noidung', 15)->comment('nội dung hợp đồng');
                $table->string('hdmb_ghichu')->comment('ghi chú hợp đồng');

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
            DB::statement("ALTER TABLE `hdmuaban` comment 'Hợp đồng mua bán'");
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
