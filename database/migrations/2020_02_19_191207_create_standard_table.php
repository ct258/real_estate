<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('standard')) {
            Schema::create('standard', function (Blueprint $table) {
                $table->increments('standard_id');
                $table->string('standard_price')->nullable()->index()->comment('Chuẩn của giá');
                $table->string('standard_price_value1')->nullable()->index()->comment('Chuẩn của giá');
                $table->string('standard_price_value2')->nullable()->index()->comment('Chuẩn của giá');
                $table->string('standard_acreage')->nullable()->index()->comment('Chuẩn của diện tích');
                $table->string('standard_acreage_value1')->nullable()->index()->comment('Chuẩn của diện tích');
                $table->string('standard_acreage_value2')->nullable()->index()->comment('Chuẩn của diện tích');

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
            DB::statement("ALTER TABLE `standard` comment 'Tiêu chuẩn'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('standard');
    }
}
