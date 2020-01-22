<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhthannhphoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tinhthanhpho')) {
            Schema::create('tinhthanhpho', function (Blueprint $table) {
                $table->bigIncrements('ttp_id')->comment('id tỉnh thành phố');
                $table->string('ttp_ten', 100)->index()->comment('tên tỉnh thành phố');
                // $table->string('ttp_ma', 2)->primary()->index()->comment('tên tỉnh thành phố');
                $table->string('ttp_ghichu', 10)->index()->nullable()->comment('ghi chú ');
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
            DB::statement("ALTER TABLE `tinhthanhpho` comment 'tỉnh thành phố'");
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
