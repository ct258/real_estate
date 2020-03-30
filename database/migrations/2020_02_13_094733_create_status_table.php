<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('status')) {
            Schema::create('status', function (Blueprint $table) {
                $table->increments('status_id')->comment('id trạng thái');
                // $table->integer('status_code')->index()->comment('mã trạng thái');
                $table->string('status_name', 45)->index()->comment('tên trạng thái');
                $table->string('status_reason')->nullable()->index()->comment('lý do');
                $table->string('status_note')->nullable()->index()->comment('ghi chú');

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

                //unique
                $table->unique(['status_name']);
            });
            DB::statement("ALTER TABLE `status` comment 'Trạng thái'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('status');
    }
}
