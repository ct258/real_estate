<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('customer')) {
            Schema::create('customer', function (Blueprint $table) {
                $table->increments('customer_id')->comment('id của khách hàng');
                // $table->string('customer_code', 10)->index()->comment('mã khách hàng');
                $table->string('customer_name')->index()->comment('họ và tên khách hàng');
                $table->string('customer_avatar')->index()->nullable()->comment('địa chỉ ảnh đại diện');
                $table->string('customer_email')->nullable()->index()->comment('email');
                $table->string('customer_tel', 20)->nullable()->index()->comment('số điện thoại');
                $table->date('customer_birth')->nullable()->index()->comment('ngày sinh');
                $table->tinyInteger('customer_gender')->nullable()->default('1')->index()->comment('giới tính');
                $table->string('customer_address')->nullable()->index()->comment('địa chỉ');
                $table->string('customer_identity_card', 20)->nullable()->index()->comment('cmnd');

                //foreign key
                $table->integer('rank_id')->index()->unsigned();
                $table->integer('account_id')->index()->unsigned();
                $table->integer('ward_id')->nullable()->index()->unsigned();

                $table->foreign('rank_id')->references('rank_id')->on('rank');
                $table->foreign('account_id')->references('account_id')->on('account');
                $table->foreign('ward_id')->references('ward_id')->on('ward');
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
                $table->unique(['customer_identity_card']);
            });
            DB::statement("ALTER TABLE `customer` comment 'Khách hàng'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('customer');
    }
}
