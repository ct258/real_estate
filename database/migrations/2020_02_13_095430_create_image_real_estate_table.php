<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('image_real_estate')) {
            Schema::create('image_real_estate', function (Blueprint $table) {
                $table->increments('image_real_estate_id');
                $table->string('image_real_estate_note', 45)->index()->comment('ghi chú hình đại diện hay hình phụ');
                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('image_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
                $table->foreign('image_id')->references('image_id')->on('image');
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
            DB::statement("ALTER TABLE `image_real_estate` comment 'Hình ảnh bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('image_real_estate');
    }
}
