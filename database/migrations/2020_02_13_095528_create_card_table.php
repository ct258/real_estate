<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('card')) {
            Schema::create('card', function (Blueprint $table) {
                $table->increments('card_id')->comment('id của giỏ hàng');
                $table->integer('card_unit')->default(1)->index()->comment('số lượng');
                $table->decimal('card_discount', 18, 4)->unsigned()->default(0)->index()->comment('giảm giá');
                $table->decimal('card_total', 18, 4)->unsigned()->index()->comment('tổng tiền');
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
            DB::statement("ALTER TABLE `card` comment 'Giỏ hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('card');
    }
}
