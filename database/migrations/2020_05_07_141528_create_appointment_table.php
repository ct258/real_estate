<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('appointment_id');
            $table->integer('customer_id');
            $table->integer('real_estate_id');
            $table->integer('account_id');
            $table->dateTime('appointment_time')->index()->comment('Thời gian hẹn');
            $table->string('appointment_content')->index()->comment('Nội dung cuộc hẹn');
            $table->string('appointment_status')->index()->comment('Trạng thái cuộc hẹn');

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


        }); DB::statement("ALTER TABLE `appointment` comment 'Cuộc hẹn'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('appointment');
    }
}
