<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardAcreageTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // if (!Schema::hasTable('standard_acreage')) {
        //     Schema::create('standard_acreage', function (Blueprint $table) {
        //         $table->increments('standard_acreage_id');
        //         $table->string('standard_acreage_name')->nullable()->index()->comment('Chuẩn của diện tích');
        //         $table->integer('standard_acreage_value1')->nullable()->unsigned()->index()->comment('Chuẩn của diện tích');
        //         $table->integer('standard_acreage_value2')->nullable()->unsigned()->index()->comment('Chuẩn của diện tích');

        //         //foreign key
        //         $table->integer('form_id')->index()->unsigned();

        //         $table->foreign('form_id')->references('form_id')->on('form');

        //         //log time
        //         $table->timestamp('created_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP'))
        //         ->comment('ngày tạo');

        //         $table->timestamp('updated_at')
        //         ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
        //         ->comment('ngày cập nhật');

        //         $table->timestamp('deleted_at')
        //         ->nullable()
        //         ->comment('ngày xóa tạm');
        //     });
        //     DB::statement("ALTER TABLE `standard_acreage` comment 'Tiêu chuẩn diện tích'");
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('standard_acreage');
    }
}
