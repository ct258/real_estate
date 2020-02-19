<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('staff')) {
            Schema::create('staff', function (Blueprint $table) {
                $table->increments('staff_id')->comment('id của nhân viên');
                $table->string('staff_code', 10)->index()->comment('mã nhân viên');
                $table->string('staff_name')->index()->comment('tên nhân viên');
                $table->date('staff_birth')->nullable()->index()->comment('ngày sinh');
                $table->tinyInteger('staff_gender')->nullable()->default('1')->index()->comment('giới tính');
                $table->string('staff_tel', 20)->nullable()->index()->comment('số điện thoại');
                $table->string('staff_email')->nullable()->index()->comment('email');
                $table->string('staff_address')->nullable()->index()->comment('địa chỉ');

                //foreign key
                $table->integer('account_id')->index()->unsigned();

                $table->foreign('account_id')->references('account_id')->on('account');
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
                $table->unique(['staff_code']);
            });
            DB::statement("ALTER TABLE `staff` comment 'Nhân viên'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('staff');
    }
}
