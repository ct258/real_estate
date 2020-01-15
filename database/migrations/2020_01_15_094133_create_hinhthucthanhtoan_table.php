<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhthucthanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hinhthucthanhtoan')){
            Schema::create('hinhthucthanhtoan', function (Blueprint $table) {
                $table->bigIncrements('httt_id');
                $table->string('httt_ten',20)->comment('tên hình thức thanh toán');
                $table->string('httt_mota',20)->comment('mô tả');
                
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

            DB::statement("ALTER TABLE `hinhthucthanhtoan` comment 'Hình thức thanh toán'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhthucthanhtoan');
    }
}
