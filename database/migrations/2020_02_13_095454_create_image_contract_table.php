<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if (!Schema::hasTable('image_contract')) {
            Schema::create('image_contract', function (Blueprint $table) {
                $table->increments('image_contract_id');
                $table->string('image_contract_path');
                //foreign key
                $table->integer('deposit_contract_id')->index()->unsigned();
                $table->integer('sale_contract_id')->index()->unsigned();

                $table->foreign('sale_contract_id')->references('sale_contract_id')->on('sale_contract')->onDelete('cascade');
                $table->foreign('deposit_contract_id')->references('deposit_contract_id')->on('deposit_contract')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `image_contract` comment 'Hình ảnh hợp đồng'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('image_contract');
    }
}
