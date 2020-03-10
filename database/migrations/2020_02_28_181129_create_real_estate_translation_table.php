<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('real_estate_translation')) {
            Schema::create('real_estate_translation', function (Blueprint $table) {
                $table->increments('translation_id')->comment('id của bất động sản dịch');
                $table->string('translation_name', 80)->index()->comment('tên bất động sản');
                $table->string('translation_address')->index()->comment('địa chỉ bất động sản');
                $table->longText('translation_description')->nullable()->index()->comment('mô tả bất động sản');
                $table->string('translation_locale', 5)->index()->comment('ngôn ngữ cần dịch');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
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

                //unique
                $table->unique(['real_estate_id', 'translation_locale']);
            });
            DB:: statement("ALTER TABLE `real_estate_translation` comment 'Đa ngôn ngữ'");
            DB:: statement('ALTER TABLE `real_estate_translation` ADD FULLTEXT `search1` (`translation_name`)');
            DB:: statement('ALTER TABLE `real_estate_translation` ADD FULLTEXT `search2` (`translation_description`)');
            DB:: statement('ALTER TABLE `real_estate_translation` ADD FULLTEXT `search3` (`translation_address`)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('translation');
    }
}
