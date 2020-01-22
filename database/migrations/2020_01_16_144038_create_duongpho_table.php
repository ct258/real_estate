<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuongTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('duongpho')) {
            Schema::create('duongpho', function (Blueprint $table) {
                $table->bigIncrements('dp_id')->comment('id của đường');
                $table->string('dp_ten', 100)->index()->comment('tên đường');
                $table->string('dp_ghichu', 50)->index()->comment('ghi chú');

                $table->integer('ttp_id')->index()->unsigned()->comment('id tỉnh thành phố');
                $table->integer('qh_id')->index()->unsigned()->comment('id quận huyện');

                $table->foreign('ttp_id')->references('ttp_id')->on('tinhthanhpho');
                $table->foreign('qh_id')->references('qh_id')->on('quanhuyen');

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
            });
            DB::statement("ALTER TABLE `duongpho` comment 'Đường'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
