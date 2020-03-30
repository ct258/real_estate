<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('unit')) {
            Schema::create('unit', function (Blueprint $table) {
                $table->increments('unit_id');
                // $table->string('unit_name')->index()->comment('tên đơn vị tiếng việt');
                $table->decimal('unit_value', 18, 4)->nullable()->unsigned()->index()->comment('giá trị quy đổi chữ sang số');

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
            DB::statement("ALTER TABLE `unit` comment 'Đơn vị'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('unit');
    }
}
