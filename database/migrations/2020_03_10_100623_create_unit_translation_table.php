<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('unit_translation')) {
            Schema::create('unit_translation', function (Blueprint $table) {
                $table->increments('unit_translation_id')->comment('id');
                $table->string('unit_translation_name')->index()->comment('ngày bắt đầu');
                $table->string('unit_translation_locale', 5)->index()->comment('ngày hết hạn');

                //foreign key
                $table->integer('unit_id')->index()->unsigned();

                $table->foreign('unit_id')->references('unit_id')->on('unit')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `unit_translation` comment 'Chi tiết thời gian treo bài'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('unit_translation');
    }
}
