<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('form_translation')) {
            Schema::create('form_translation', function (Blueprint $table) {
                $table->increments('form_translation_id')->comment('id');
                $table->string('form_translation_name')->index()->comment('ngày bắt đầu');
                $table->string('form_translation_locale', 5)->index()->comment('ngày hết hạn');

                //foreign key
                $table->integer('form_id')->index()->unsigned();

                $table->foreign('form_id')->references('form_id')->on('form')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `form_translation` comment 'Chi tiết thời gian treo bài'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('form_translation');
    }
}
