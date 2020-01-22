<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quanhuyen')) {
            Schema::create('quanhuyen', function (Blueprint $table) {
                $table->bigIncrements('qh_id')->comment('id của quận huyện');
                // $table->string('qh_ma', 5)->primary()->index()->comment('mã quận huyện');
                $table->string('qh_ten', 100)->index()->comment('tên quận huyện');
                $table->string('qh_ghichu', 20)->index()->nullable()->comment('ghi chú quận hay huyện');
                $table->integer('ttp_id')->unsigned()->index()->comment('id tỉnh thành phố');
                $table->foreign('ttp_id')->references('ttp_id')->on('tinhthanhpho');

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
            DB::statement("ALTER TABLE `quanhuyen` comment 'Quận huyện'");
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