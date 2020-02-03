<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaibdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('loaibds')) {
            Schema::create('loaibds', function (Blueprint $table) {
                $table->increments('loaibds_id')->comment('id của loại bất động sản');
                $table->string('loaibds_ten')->index()->comment('tên loại bất động sản');

                $table->integer('nhucau_id')->index()->unsigned()->comment('tên loại nhu cầu');

                $table->foreign('nhucau_id')->references('nhucau_id')->on('nhucau');
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
            DB::statement("ALTER TABLE `loaibds` comment 'Loại bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
