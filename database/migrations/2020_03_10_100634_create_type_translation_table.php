<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTranslationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('type_translation')) {
            Schema::create('type_translation', function (Blueprint $table) {
                $table->increments('type_translation_id')->comment('id');
                $table->string('type_translation_name')->index()->comment('tên');
                $table->string('type_translation_locale', 5)->index();

                //foreign key
                $table->integer('type_id')->index()->unsigned();

                $table->foreign('type_id')->references('type_id')->on('type')->onDelete('cascade');
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
            DB::statement("ALTER TABLE `type_translation` comment 'Loại bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('type_translation');
    }
}
