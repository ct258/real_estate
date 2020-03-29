<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerageFeeTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('brokerage_fee_translation')) {
            Schema::create('brokerage_fee_translation', function (Blueprint $table) {
                $table->increments('brokerage_fee_translation_id')->comment('id');
                $table->string('bft_name')->index()->comment('Tên gói');
                $table->string('bft_note')->index()->comment('Ghi chú');
                $table->string('bft_locale', 5)->index()->comment('Ngôn ngữ');

                //foreign key
                $table->integer('brokerage_fee_id')->index()->unsigned();

                $table->foreign('brokerage_fee_id')->references('brokerage_fee_id')->on('brokerage_fee')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `brokerage_fee_translation` comment 'Chi tiết thời gian treo bài'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('brokerage_fee_translation');
    }
}
