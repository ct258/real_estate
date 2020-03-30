<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('permission')) {
            Schema::create('permission', function (Blueprint $table) {
                $table->increments('permission_id')->comment('id của đường link');
                $table->string('permission_link')->index()->comment('đường link trong file web');
                $table->string('permission_name', 45)->index()->comment('tên chức năng đường link');


                //unique
                $table->unique(['permission_link']);
            });
            DB::statement("ALTER TABLE `permission` comment 'Đường link'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('permission');
    }
}
