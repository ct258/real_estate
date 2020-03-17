<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailFeeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('detail_fee')) {
            Schema::create('detail_fee', function (Blueprint $table) {
                $table->increments('detail_fee_id')->comment('id');
                $table->date('detail_fee_from')->comment('ngày bắt đầu');
                $table->date('detail_fee_to')->comment('ngày hết hạn');
                $table->decimal('detail_fee_total_money', 18, 4)->comment('Tổng tiền');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('brokerage_fee_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
                $table->foreign('brokerage_fee_id')->references('brokerage_fee_id')->on('brokerage_fee');
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
            DB::statement("ALTER TABLE `detail_fee` comment 'Chi tiết thời gian treo bài'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('detail_fee');
    }
}
