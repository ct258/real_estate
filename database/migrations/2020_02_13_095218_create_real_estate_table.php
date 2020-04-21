<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('real_estate')) {
            Schema::create('real_estate', function (Blueprint $table) {
                $table->increments('real_estate_id')->comment('id của bất động sản');
                $table->string('real_estate_acreage')->index()->comment('diện tích bất động sản');
                $table->string('real_estate_avatar')->comment('hình dại diện');
                $table->decimal('real_estate_price', 18, 4)->unsigned()->index()->comment('giá trị');
                $table->decimal('real_estate_deposit', 18, 4)->unsigned()->nullable()->comment('giá đặt cọc');
                $table->integer('real_estate_contract')->unsigned()->nullable()->comment('thời gian cung cấp giấy tờ');
                $table->decimal('real_estate_longitude', 8, 6)->nullable()->comment('kinh độ');
                $table->decimal('real_estate_latitude', 8, 6)->nullable()->comment('vĩ độ');
                $table->string('real_estate_status')->comment('trạng thái');

                //foreign key
                $table->integer('type_id')->index()->unsigned();
                // $table->integer('status_id')->index()->unsigned();
                $table->integer('brokerage_fee_id')->nullable()->unsigned();
                $table->integer('district_id')->nullable()->index()->unsigned();
                $table->integer('ward_id')->nullable()->index()->unsigned();
                $table->integer('street_id')->nullable()->index()->unsigned();
                $table->integer('unit_id')->nullable()->index()->unsigned();
                $table->integer('customer_id')->nullable()->index()->unsigned();
                // $table->integer('convenience_id')->nullable()->index()->unsigned();

                // $table->foreign('convenience_id')->references('convenience_id')->on('convenience');
                $table->foreign('type_id')->references('type_id')->on('type');
                // $table->foreign('status_id')->references('status_id')->on('status');
                $table->foreign('brokerage_fee_id')->references('brokerage_fee_id')->on('brokerage_fee');
                $table->foreign('district_id')->references('district_id')->on('district');
                $table->foreign('ward_id')->references('ward_id')->on('ward');
                $table->foreign('street_id')->references('street_id')->on('street');
                $table->foreign('unit_id')->references('unit_id')->on('unit');
                $table->foreign('customer_id')->references('customer_id')->on('customer');
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
            DB:: statement("ALTER TABLE `real_estate` comment 'Bất động sản'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('real_estate');
    }
}
