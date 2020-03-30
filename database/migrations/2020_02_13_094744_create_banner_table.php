<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('banner')) {
            Schema::create('banner', function (Blueprint $table) {
                $table->increments('banner_id')->comment('id của banner');
                $table->string('banner_title')->index()->comment('tiêu đề');
                $table->string('banner_path')->index()->comment('đường dẫn hình ảnh banner');
                $table->text('banner_link')->nullable()->index()->comment('link khi click vào');

                //foreign key
                // $table->integer('status_id')->index()->unsigned();

                // $table->foreign('status_id')->references('status_id')->on('status');

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
            DB::statement("ALTER TABLE `banner` comment 'hình banner'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('banner');
    }
}
