<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('user_onlines')) {
            Schema::create('user_onlines', function (Blueprint $table) {
                $table->bigIncrements('uo_id')->comment('id của đường');
                $table->string('uo_session', 100)->nullable()->comment('tên session');
                $table->integer('uo_time')->nullable()->comment('thời điểm truy cập');
                $table->integer('uo_active')->nullable()->comment('trạng thái');
            });
            DB::statement("ALTER TABLE `user_onlines` comment 'Đếm số lượt truy cập'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
