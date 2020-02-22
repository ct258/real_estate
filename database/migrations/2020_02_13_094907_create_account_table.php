<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('account')) {
            Schema::create('account', function (Blueprint $table) {
                $table->increments('account_id')->comment('id của tài khoản');
                $table->string('username')->index()->comment('tên đăng nhập');
                $table->string('password')->index()->comment('mật khẩu');
                $table->longText('remember_token')->nullable()->index()->comment('lưu đăng nhập ');

                //foreign key
                $table->integer('role_id')->index()->unsigned();

                $table->foreign('role_id')->references('role_id')->on('role');

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
                $table->unique(['username']);
            });
            DB::statement("ALTER TABLE `account` comment 'Tài khoản'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('account');
    }
}
