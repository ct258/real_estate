<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('payment')) {
            Schema::create('payment', function (Blueprint $table) {
                $table->increments('payment_id')->comment('id của phương thức thanh toán');
                $table->string('payment_code', 45)->index()->comment('mã phương thức thanh toán');
                $table->string('payment_name', 45)->index()->comment('tên phương thức thanh toán');
                $table->string('payment_image', 255)->index()->comment('Hình ảnh đại diện');
                // $table->string('payment_description')->nullable()->index()->comment('mô tả phương thức thanh toán');

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
                $table->unique(['payment_code', 'payment_name']);
            });
            DB::statement("ALTER TABLE `payment` comment 'Phương thức thanh toán'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('payment');
    }
}
