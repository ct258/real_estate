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
                $table->integer('cart_unit')->default(1)->comment('số lượng');
                $table->decimal('cart_discount', 18, 4)->unsigned()->default(0)->comment('giảm giá');
                $table->decimal('cart_total', 18, 4)->unsigned()->comment('tổng tiền');
                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('customer_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
                $table->foreign('customer_id')->references('customer_id')->on('customer');
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
