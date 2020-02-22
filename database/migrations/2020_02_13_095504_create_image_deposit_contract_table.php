<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageDepositContractTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('image_deposit_contract')) {
            Schema::create('image_deposit_contract', function (Blueprint $table) {
                $table->increments('image_deposit_contract_id');
                //foreign key
                $table->integer('image_id')->index()->unsigned();
                $table->integer('deposit_contract_id')->index()->unsigned();

                $table->foreign('image_id')->references('image_id')->on('image');
                $table->foreign('deposit_contract_id')->references('deposit_contract_id')->on('deposit_contract');
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
            DB::statement("ALTER TABLE `image_deposit_contract` comment 'Hình ảnh hợp đồng đặt cọc'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('image_deposit_contract');
    }
}
