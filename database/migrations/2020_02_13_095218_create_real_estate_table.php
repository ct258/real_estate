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
                $table->string('real_estate_name_en', 80)->nullable()->index()->comment('tên bất động sản tiếng anh');
                $table->string('real_estate_name_vi', 80)->index()->comment('tên bất động sản tiếng việt');
                $table->string('real_estate_acreage')->index()->comment('diện tích bất động sản');
                $table->decimal('real_estate_price', 18, 4)->unsigned()->index()->comment('giá trị hiển thị');
                $table->decimal('real_estate_price_total', 18, 4)->unsigned()->index()->comment('giá trị thật sự');
                $table->longText('real_estate_description_en')->nullable()->index()->comment('mô tả bất động sản tiếng anh');
                $table->longText('real_estate_description_vi')->nullable()->index()->comment('mô tả bất động sản tiếng việt');
                $table->string('real_estate_address')->index()->comment('địa chỉ bất động sản');

                //foreign key
                $table->integer('type_id')->index()->unsigned();
                $table->integer('status_id')->index()->unsigned();
                $table->integer('brokerage_fee_id')->nullable()->index()->unsigned();
                $table->integer('district_id')->nullable()->index()->unsigned();
                $table->integer('ward_id')->nullable()->index()->unsigned();
                $table->integer('street_id')->nullable()->index()->unsigned();
                $table->integer('unit_id')->nullable()->index()->unsigned();
                $table->integer('customer_id')->nullable()->index()->unsigned();

                $table->foreign('type_id')->references('type_id')->on('type');
                $table->foreign('status_id')->references('status_id')->on('status');
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
            DB:: statement('ALTER TABLE `real_estate` ADD FULLTEXT `search1` (`real_estate_name_vi`)');
            DB:: statement('ALTER TABLE `real_estate` ADD FULLTEXT `search2` (`real_estate_name_en`)');
            DB:: statement('ALTER TABLE `real_estate` ADD FULLTEXT `search3` (`real_estate_description_en`)');
            DB:: statement('ALTER TABLE `real_estate` ADD FULLTEXT `search4` (`real_estate_description_vi`)');
            // DB:: statement('ALTER TABLE `real_estate` ADD FULLTEXT `search5` (`real_estate_price`)');
            // DB::statement('ALTER TABLE users ADD FULLTEXT `name` (`name`)');
            // DB:: statement('ALTER TABLE SET FOREIGN_KEY_CHECKS=0; ENGINE = MyISAM; SET FOREIGN_KEY_CHECKS=1;');
            // DB::statement('ALTER TABLE `real_estate` ENGINE = MyISAM');
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
