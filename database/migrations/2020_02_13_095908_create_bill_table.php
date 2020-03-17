<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('bill')) {
            Schema::create('bill', function (Blueprint $table) {
                $table->increments('bill_id')->comment('id của loại nhu cầu');
                $table->text('bill_content')->comment('tổng giá tiền thanh toán');
                $table->decimal('bill_discount', 18, 4)->unsigned()->comment('tổng giá tiền thanh toán');
                $table->decimal('bill_total', 18, 4)->unsigned()->comment('tổng giá tiền thanh toán');
                //foreign key
                $table->integer('status_id')->unsigned();
                $table->integer('staff_id')->unsigned();
                $table->integer('cart_id')->unsigned();
                $table->integer('payment_id')->unsigned();

                $table->foreign('status_id')->references('status_id')->on('status');
                $table->foreign('staff_id')->references('staff_id')->on('staff');
                $table->foreign('cart_id')->references('cart_id')->on('cart');
                $table->foreign('payment_id')->references('payment_id')->on('payment');
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
            });
            DB::statement("ALTER TABLE `bill` comment 'Hóa đơn'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('bill');
    }
}
