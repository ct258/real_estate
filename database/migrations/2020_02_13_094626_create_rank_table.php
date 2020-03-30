<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('rank')) {
            Schema::create('rank', function (Blueprint $table) {
                $table->increments('rank_id')->comment('id của loại khách hàng');
                $table->integer('rank_level')->unsigned()->index()->comment('hạng mức');
                // $table->string('rank_name')->index()->comment('tên loại khách hàng');
                // $table->string('rank_description')->nullable()->index()->comment('mô tả loại khách hàng');

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
                // $table->unique(['rank_level', 'rank_name', 'rank_description']);
                $table->unique('rank_level');
            });
            DB::statement("ALTER TABLE `rank` comment 'Loại khách hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('rank');
    }
}
