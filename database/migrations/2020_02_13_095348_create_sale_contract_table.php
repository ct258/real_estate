<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleContractTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('sale_contract')) {
            Schema::create('sale_contract', function (Blueprint $table) {
                $table->increments('sale_contract_id')->comment('id của hợp đồng');
                $table->string('sale_contract_code', 45)->index()->comment('mã hợp đồng');
                $table->string('sale_contract_nameA')->index()->comment('tên bên A');
                $table->string('sale_contract_nameB')->index()->comment('tên bên B');
                $table->date('sale_contract_sign_day')->index()->comment('ngày ký');
                $table->decimal('sale_contract_total_money', 18, 4)->unsigned()->index()->comment('tổng tiền');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
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

                //unique
                $table->unique(['sale_contract_code']);
            });
            DB::statement("ALTER TABLE `sale_contract` comment 'Hợp đồng mua bán'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('sale_contract');
    }
}
