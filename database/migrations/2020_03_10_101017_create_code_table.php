<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('code')) {
            Schema::create('code', function (Blueprint $table) {
                $table->increments('code_id')->comment('id');
                $table->string('code_name', 45)->nullable()->index()->comment('Tên mã code');
                $table->string('code_note', 45)->nullable()->index()->comment('ghi chú');
                $table->string('code_code', 10)->index()->comment('mã code');
                $table->integer('code_amount')->nullable()->index()->comment('Số lượng code');
                $table->decimal('code_min', 18, 4)->nullable()->index()->comment('Tối thiểu hóa đơn');
                $table->decimal('code_max', 18, 4)->nullable()->index()->comment('tối đa số tiền');
                $table->integer('code_per')->nullable()->index()->comment('Phần trăm khuyến mãi');
                $table->dateTime('code_begin')->nullable()->index()->comment('Ngày bắt đầu');
                $table->dateTime('code_end')->nullable()->index()->comment('Ngày kết thúc');

                //foreign key
                $table->integer('staff_id')->nullable()->index()->unsigned();
                $table->integer('customer_id')->nullable()->index()->unsigned();
                $table->integer('rank_id')->nullable()->index()->unsigned();
                $table->integer('type_id')->index()->unsigned();
                $table->integer('real_estate_id')->nullable()->index()->unsigned();

                $table->foreign('staff_id')->references('staff_id')->on('staff');
                $table->foreign('customer_id')->references('customer_id')->on('customer');
                $table->foreign('rank_id')->references('rank_id')->on('rank');
                $table->foreign('type_id')->references('type_id')->on('type');
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
            });
            DB::statement("ALTER TABLE `code` comment 'Mã giảm giá'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('code');
    }
}
