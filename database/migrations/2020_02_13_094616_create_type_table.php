<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('type')) {
            Schema::create('type', function (Blueprint $table) {
                $table->increments('type_id')->comment('id của loại bất động sản');
                // $table->string('type_code', 45)->index()->comment('mã loại bất động sản');
                // $table->string('type_name', 45)->index()->comment('tên loại bất động sản');

                //foreign key
                $table->integer('form_id')->index()->unsigned();

                $table->foreign('form_id')->references('form_id')->on('form');
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
            DB::statement("ALTER TABLE `type` comment 'Loại bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('type');
    }
}
