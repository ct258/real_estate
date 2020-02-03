<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhucauTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('nhucau')) {
            Schema::create('nhucau', function (Blueprint $table) {
                $table->increments('nhucau_id')->comment('id của loại nhu cầu');
                $table->string('nhucau_ten')->index()->comment('tên nhu cầu (bán/thuê)');

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
                //sdt và cmnd không được trùng
            });
            DB::statement("ALTER TABLE `nhucau` comment 'Loại nhu cầu'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
