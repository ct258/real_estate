<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('cart')) {
            Schema::create('cart', function (Blueprint $table) {
                $table->increments('cart_id')->comment('id của giỏ hàng');
                $table->string('cart_status')->index()->nullable()->default(null);

                //foreign key
                $table->integer('code_id')->index()->unsigned()->nullable();
                $table->integer('customer_id')->index()->unsigned();
                $table->integer('payment_id')->index()->unsigned()->nullable();
                $table->integer('staff_id')->index()->unsigned()->nullable();
                // $table->integer('status_id')->index()->unsigned();

                $table->foreign('code_id')->references('code_id')->on('code');
                $table->foreign('customer_id')->references('customer_id')->on('customer');
                $table->foreign('payment_id')->references('payment_id')->on('payment');
                $table->foreign('staff_id')->references('staff_id')->on('staff');
                // $table->foreign('status_id')->references('status_id')->on('status');
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
            DB::statement("ALTER TABLE `cart` comment 'Giỏ hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('cart');
    }
}
