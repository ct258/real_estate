<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('detail_temp')) {
            Schema::create('detail_temp', function (Blueprint $table) {
                $table->increments('detail_temp_id')->comment('id của giỏ hàng tạm');
                $table->decimal('detail_temp_price',18,4)->nullable()->comment('giá');


                //foreign key
                $table->integer('cart_temp_id')->unsigned();
                $table->integer('real_estate_id')->unsigned();

                $table->foreign('cart_temp_id')->references('cart_temp_id')->on('cart_temp')->onDelete('cascade');
                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
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
            });
            DB:: statement("ALTER TABLE `detail_temp` comment 'Giỏ hàng tạm'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('detail_temp');
    }
}
