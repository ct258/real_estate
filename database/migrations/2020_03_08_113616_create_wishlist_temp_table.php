<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistTempTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('wishlist_temp')) {
            Schema::create('wishlist_temp', function (Blueprint $table) {
                $table->increments('wishlist_temp_id')->comment('id của danh sách yêu thích');
                $table->string('wishlist_temp_cookie_name', 80)->comment('tên cookie');
                $table->text('wishlist_temp_list')->comment('danh sách');

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
            DB::statement("ALTER TABLE `wishlist_temp` comment 'Danh sách yêu thích'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('wishlist_temp_temp');
    }
}
