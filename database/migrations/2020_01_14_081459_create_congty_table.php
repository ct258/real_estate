<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('congty')) {
            Schema::create('congty', function (Blueprint $table) {
                $table->bigIncrements('ct_id')->comment('id của công ty');
                $table->string('ct_ten')->comment('tên công ty');
                $table->string('ct_diachi')->comment('địa chỉ công ty');
                $table->string('ct_email')->comment('số điện thoại');
                $table->string('ct_fax', 20)->comment('số fax công ty');
                $table->string('ct_sdt', 15)->comment('số điện thoại công ty');
                

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
            DB::statement("ALTER TABLE `congty` comment 'Công ty'");
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
