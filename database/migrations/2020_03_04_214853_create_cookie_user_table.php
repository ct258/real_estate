<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookieUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cookie_user')) {
            Schema::create('cookie_user', function (Blueprint $table) {
                $table->increments('cookie_user_id')->comment('id của cookie');
                // $table->string('cookie_user_name', 80)->comment('tên cookie');

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
            DB:: statement("ALTER TABLE `cookie_user` comment 'tài khoản tạm'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cookie_user');
    }
}
