<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('evaluate')) {
            Schema::create('evaluate', function (Blueprint $table) {
                $table->bigIncrements('evaluate_id')->comment('id của đánh giá');
                // $table->integer('evaluate_reply')->index()->comment('trả lời cho bình luận số ...');
                $table->string('evaluate_title')->nullable()->index()->comment('tiêu đề đánh giá');
                $table->string('evaluate_content')->nullable()->index()->comment('nội dung đánh giá');
                $table->string('evaluate_rank')->unsigned()->index()->comment('số sao đánh giá');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('customer_id')->index()->unsigned();
                $table->integer('evaluate_reply')->index()->unsigned()->nullable()->comment('trả lời cho bình luận số ...');

                $table->foreign('evaluate_reply')->references('evaluate_id')->on('evaluate')->onDelete('evaluate_id');
                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
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
            DB::statement("ALTER TABLE `evaluate` comment 'Đánh giá'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('evaluate');
    }
}
