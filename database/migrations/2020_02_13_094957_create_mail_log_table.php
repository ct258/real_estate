<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailLogTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('mail_log')) {
            Schema::create('mail_log', function (Blueprint $table) {
                $table->increments('mail_log_id')->comment('id của loại nhu cầu');
                $table->dateTime('mail_log_send_datetime')->index()->comment('thời gian gửi');
                $table->string('mail_log_send_to')->index()->comment('người nhận mail');
                $table->string('mail_log_send_subject')->nullable()->index()->comment('tiêu đề');
                $table->text('mail_log_send_body')->nullable()->index()->comment('nội dung mail');

                //foreign key
                $table->integer('mail_template_id')->index()->unsigned();

                $table->foreign('mail_template_id')->references('mail_template_id')->on('mail_template');
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
            DB::statement("ALTER TABLE `mail_log` comment 'Loại nhu cầu'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('mail_log');
    }
}
