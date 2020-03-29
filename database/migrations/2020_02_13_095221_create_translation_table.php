<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('translation')) {
            Schema::create('translation', function (Blueprint $table) {
                $table->increments('translation_id')->comment('id của bất động sản dịch');
                $table->string('translation_name', 80)->comment('tên bất động sản');
                $table->string('translation_address')->comment('địa chỉ bất động sản');
                $table->longText('translation_description')->nullable()->comment('mô tả bất động sản');
                $table->string('translation_locale', 5)->comment('ngôn ngữ cần dịch');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
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
                $table->unique(['real_estate_id', 'translation_locale']);
            });
            DB:: statement("ALTER TABLE `translation` comment 'Đa ngôn ngữ'");
            DB:: statement('ALTER TABLE `translation` ADD FULLTEXT `search1` (`translation_name`)');
            DB:: statement('ALTER TABLE `translation` ADD FULLTEXT `search2` (`translation_description`)');
            DB:: statement('ALTER TABLE `translation` ADD FULLTEXT `search3` (`translation_address`)');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('translation');
    }
}
