<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudautuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chudautu')) {
            Schema::create('chudautu', function (Blueprint $table) {
                $table->bigIncrements('cdt_id')->comment('id của chủ đầu tư');
                    $table->string('cdt_hoten', 20)->comment('họ và tên chủ đầu tư');
                    $table->string('cdt_diachi', 50)->comment('địa chỉ chủ đầu tư');
                    $table->string('cdt_email')->comment('email chủ đầu tư');
                    $table->string('cdt_sdt', 20)->comment('số điện thoại');
                    $table->string('cdt_tongthauECP')->comment('tổng thầu');

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
            DB::statement("ALTER TABLE `chudautu` comment 'Chủ đầu tư'");
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
