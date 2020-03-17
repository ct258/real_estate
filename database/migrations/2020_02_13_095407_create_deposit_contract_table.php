<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositContractTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('deposit_contract')) {
            Schema::create('deposit_contract', function (Blueprint $table) {
                $table->increments('deposit_contract_id')->comment('id của hợp đồng');
                $table->string('deposit_contract_code', 45)->index()->comment('mã hợp đồng');
                $table->string('deposit_contract_nameA')->index()->comment('tên bên A');
                $table->string('deposit_contract_nameB')->index()->comment('tên bên B');
                $table->date('deposit_contract_sign_day')->index()->comment('ngày ký');
                $table->decimal('deposit_contract_total_money', 18, 4)->index()->comment('tổng tiền');
                $table->date('deposit_contract_term')->nullable()->index()->comment('thời hạn hợp đồng');
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
                $table->unique(['deposit_contract_code']);
            });
            DB::statement("ALTER TABLE `deposit_contract` comment 'Hợp đồng đặt cọc'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('deposit_contract');
    }
}
