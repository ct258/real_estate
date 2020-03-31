<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('detail_cart')) {
            Schema::create('detail_cart', function (Blueprint $table) {
                $table->increments('detail_cart_id')->comment('id của giỏ hàng');
                $table->decimal('detail_cart_price',18,4)->nullable()->comment('Giá sản phẩm');

                //foreign key
                $table->integer('cart_id')->index()->unsigned();
                $table->integer('real_estate_id')->index()->unsigned();

                $table->foreign('cart_id')->references('cart_id')->on('cart');
                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
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
                // Setting unique
            });
            DB::statement("ALTER TABLE `detail_cart` comment 'Chi tiết giỏ hàng'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('detail_cart');
    }
}
