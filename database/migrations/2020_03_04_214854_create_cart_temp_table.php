<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTempTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('cart_temp')) {
            Schema::create('cart_temp', function (Blueprint $table) {
                $table->increments('cart_temp_id')->comment('id của giỏ hàng tạm');


                //foreign key
                $table->integer('code_id')->nullable()->unsigned();
                $table->integer('cookie_user_id')->unsigned();

                $table->foreign('code_id')->references('code_id')->on('code')->onDelete('cascade');
                $table->foreign('cookie_user_id')->references('cookie_user_id')->on('cookie_user')->onDelete('cascade');
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
            DB:: statement("ALTER TABLE `cart_temp` comment 'Giỏ hàng tạm'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('cart_temp');
    }
}
