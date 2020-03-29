<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('about_translation')) {
            Schema::create('about_translation', function (Blueprint $table) {
                $table->increments('about_translation_id')->comment('id');
                $table->text('about_translation_content')->index()->comment('Nội dung');
                $table->string('about_translation_locale', 5)->index()->comment('ngôn ngữ');

                //foreign key
                $table->integer('about_id')->index()->unsigned();

                $table->foreign('about_id')->references('about_id')->on('about')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `about_translation` comment 'Thông tin công ty'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('about_translation');
    }
}
