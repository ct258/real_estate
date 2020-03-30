<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('blog_translation')) {
            Schema::create('blog_translation', function (Blueprint $table) {
                $table->increments('blog_translation_id')->comment('id');
                $table->string('blog_translation_title')->index()->comment('Tiêu đề');
                $table->text('blog_translation_content')->index()->comment('Nội dung');
                $table->string('blog_translation_locale', 5)->index()->comment('ngôn ngữ');

                //foreign key
                $table->integer('blog_id')->index()->unsigned();

                $table->foreign('blog_id')->references('blog_id')->on('blog')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `blog_translation` comment 'Bài viết'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('blog_translation');
    }
}
