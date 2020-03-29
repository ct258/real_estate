<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerageFeeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('brokerage_fee')) {
            Schema::create('brokerage_fee', function (Blueprint $table) {
                $table->increments('brokerage_fee_id')->comment('id của phí đăng bài');
                $table->string('brokerage_fee_code')->index()->comment('mã phí đăng bài');
                // $table->string('brokerage_fee_name')->index()->comment('tên phí đăng bài');
                $table->string('brokerage_fee_price')->index()->comment('giá đăng bài');
                // $table->string('brokerage_fee_description')->index()->comment('mô tả');

                //log time
                // $table->timestamp('created_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP'))
                // ->comment('ngày tạo');

                // $table->timestamp('updated_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                // ->comment('ngày cập nhật');

                // $table->timestamp('deleted_at')
                // ->nullable()
                // ->comment('ngày xóa tạm');

                //unique
                $table->unique(['brokerage_fee_code']);
            });
            DB::statement("ALTER TABLE `brokerage_fee` comment 'Phí đăng bài'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('brokerage_fee');
    }
}
