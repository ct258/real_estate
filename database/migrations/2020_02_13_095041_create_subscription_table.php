<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('subscription')) {
            Schema::create('subscription', function (Blueprint $table) {
                $table->increments('subscription_id');

                //foreign key
                $table->integer('customer_id')->index()->unsigned();
                // $table->integer('type_id')->index()->unsigned();
                // $table->integer('province_id')->index()->unsigned();
                // $table->integer('district_id')->nullable()->index()->unsigned();

                // $table->foreign('type_id')->references('type_id')->on('type');
                // $table->foreign('province_id')->references('province_id')->on('province');
                // $table->foreign('district_id')->references('district_id')->on('district');
                $table->foreign('customer_id')->references('customer_id')->on('customer');
                //log time
                // $table->timestamp('created_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP'))
                // ->comment('ngày tạo');

                // $table->timestamp('updated_at')
                // ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                // ->comment('ngày cập nhật');

                // $table->timestamp('deleted_at')
                // ->nullable()
                // ->comment('ngày xóa tạm');
            });
            DB::statement("ALTER TABLE `subscription` comment 'Đăng ký nhận tin'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('subscription');
    }
}
