<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardPriceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // if (!Schema::hasTable('standard_price')) {
        //     Schema::create('standard_price', function (Blueprint $table) {
        //         $table->increments('standard_price_id');
        //         $table->string('standard_price_name')->nullable()->index()->comment('Chuẩn của giá');
        //         $table->decimal('standard_price_value1', 18, 4)->nullable()->unsigned()->index()->comment('Chuẩn của giá');
        //         $table->decimal('standard_price_value2', 18, 4)->nullable()->unsigned()->index()->comment('Chuẩn của giá');

        //         //foreign key
        //         $table->integer('form_id')->index()->unsigned();

        //         $table->foreign('form_id')->references('form_id')->on('form');

        //         //log time
        //         $table->timestamp('created_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP'))
        //         ->comment('ngày tạo');

        //         $table->timestamp('updated_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
        //         ->comment('ngày cập nhật');

        //         $table->timestamp('deleted_at')
        //         ->nullable()
        //         ->comment('ngày xóa tạm');
        //     });
        //     DB::statement("ALTER TABLE `standard_price` comment 'Tiêu chuẩn giá'");
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('standard_price');
    }
}
