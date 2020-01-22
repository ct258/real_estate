<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongxaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('phuongxa')) {
            Schema::create('phuongxa', function (Blueprint $table) {
                $table->bigIncrements('px_id')->comment('id của phường xã');
                // $table->string('px_ma', 5)->primary()->index()->comment('tên quận huyện');
                $table->string('px_ten', 100)->index()->comment('tên phường xã');
                $table->string('px_ghichu', 20)->index()->nullable()->comment('ghi chú');

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
            DB::statement("ALTER TABLE `phuongxa` comment 'Phường xã'");
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
