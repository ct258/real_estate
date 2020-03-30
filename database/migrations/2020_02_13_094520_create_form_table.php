<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('form')) {
            Schema::create('form', function (Blueprint $table) {
                $table->increments('form_id')->comment('id của loại nhu cầu');
                // $table->string('form_code', 45)->index()->comment('mã nhu cầu (bán/thuê)');
                // $table->string('form_name', 45)->index()->comment('tên nhu cầu (bán/thuê)');

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
            DB::statement("ALTER TABLE `form` comment 'Nhu cầu ( thuê, bán..)'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('form');
    }
}
