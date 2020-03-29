<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('rank_translation')) {
            Schema::create('rank_translation', function (Blueprint $table) {
                $table->increments('rank_translation_id')->comment('id');
                $table->string('rank_translation_name')->index()->comment('tên loại khách hàng');
                $table->string('rank_translation_description')->index()->comment('mô tả');
                $table->string('rank_translation_locale', 5)->index()->comment('ngôn ngữ');

                //foreign key
                $table->integer('rank_id')->index()->unsigned();

                $table->foreign('rank_id')->references('rank_id')->on('rank')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `rank_translation` comment 'Loại khách hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('rank_translation');
    }
}
