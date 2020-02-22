<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('role')) {
            Schema::create('role', function (Blueprint $table) {
                $table->increments('role_id')->comment('id của vai trò');
                $table->integer('role_level')->unsigned()->index()->comment('vai trò (khách, nv, quản lý,...)');
                $table->string('role_name', 45)->index()->comment('tên vai trò');
                $table->string('role_note', 45)->nullable()->index()->comment('ghi chú');

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
                $table->unique(['role_level', 'role_name']);
            });
            DB::statement("ALTER TABLE `role` comment 'Vai trò'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('role');
    }
}
