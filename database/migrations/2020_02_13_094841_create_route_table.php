<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('route')) {
            Schema::create('route', function (Blueprint $table) {
                $table->increments('route_id')->comment('id của đường link');
                $table->string('route_link')->index()->comment('đường link trong file web');
                $table->string('route_name', 45)->index()->comment('tên chức năng đường link');

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
                $table->unique(['route_link']);
            });
            DB::statement("ALTER TABLE `route` comment 'Đường link'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('route');
    }
}
