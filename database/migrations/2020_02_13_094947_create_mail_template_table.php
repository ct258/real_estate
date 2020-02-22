<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('mail_template')) {
            Schema::create('mail_template', function (Blueprint $table) {
                $table->increments('mail_template_id')->comment('id mẫu mail');
                $table->string('mail_template_code', 45)->index()->comment('mã mẫu mail');
                $table->string('mail_template_subject')->nullable()->index()->comment('tiêu đề');
                $table->text('mail_template_body')->nullable()->index()->comment('nội dung mail');

                //foreign key
                $table->integer('staff_id')->index()->unsigned();

                $table->foreign('staff_id')->references('staff_id')->on('staff');
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
            DB::statement("ALTER TABLE `mail_template` comment 'Mẫu mail'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('mail_template');
    }
}
