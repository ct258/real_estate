<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentLogTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // if (!Schema::hasTable('payment_log')) {
        //     Schema::create('payment_log', function (Blueprint $table) {
        //         $table->increments('payment_log_id');
        //         $table->string('payment_log_code', 45)->index()->comment('Số giao dịch');
        //         // $table->dateTime('payment_log_datetime')->index()->comment('thời gian giao dịch');
        //         $table->string('payment_log_status', 45)->index()->comment('trạng thái giao dịch');
        //         //foreign key
        //         $table->integer('bill_id')->index()->unsigned();

        //         $table->foreign('bill_id')->references('bill_id')->on('bill');
        //         //log time
        //         $table->timestamp('created_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP'))
        //         ->comment('ngày tạo');

        //         $table->timestamp('updated_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
        //         ->comment('ngày cập nhật');

        //         $table->timestamp('deleted_at')
        //         ->nullable()
        //         ->comment('ngày xóa tạm');

        //         //unique
        //         $table->unique(['payment_log_code']);
        //     });
        //     DB::statement("ALTER TABLE `payment_log` comment 'Nhật ký thanh toán'");
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('payment_log');
    }
}
