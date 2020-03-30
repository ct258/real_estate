<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // if (!Schema::hasTable('promotion_translation')) {
        //     Schema::create('promotion_translation', function (Blueprint $table) {
        //         $table->increments('promotion_translation_id')->index()->comment('id');
        //         $table->string('promotion_translation_title')->index()->comment('tiêu đề');
        //         $table->text('promotion_translation_content')->index()->comment('nội dung');
        //         $table->string('promotion_translation_locale')->index()->comment('ngôn ngữ');

        //         //foreign key
        //         $table->integer('promotion_id')->index()->unsigned();

        //         $table->foreign('promotion_id')->references('promotion_id')->on('promotion');
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
        //     DB::statement("ALTER TABLE `promotion_translation` comment 'Khuyến mãi'");
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('promotion_translation');
    }
}
