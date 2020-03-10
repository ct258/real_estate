<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewedProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('viewed_product')) {
            Schema::create('viewed_product', function (Blueprint $table) {
                $table->increments('viewed_product_id')->comment('id của danh sách yêu thích');
                $table->string('viewed_product_cookie_name', 80)->comment('tên cookie');
                $table->text('viewed_product_list')->comment('danh sách');

                //foreign key
                // $table->integer('real_estate_id')->index()->unsigned();
                // $table->integer('customer_id')->index()->unsigned();

                // $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
                // $table->foreign('customer_id')->references('customer_id')->on('customer');
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
            DB::statement("ALTER TABLE `viewed_product` comment 'Sản phẩm đã xem'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('viewed_product');
    }
}
