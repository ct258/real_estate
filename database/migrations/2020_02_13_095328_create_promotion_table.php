<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up()
    // {
    //     if (!Schema::hasTable('promotion')) {
    //         Schema::create('promotion', function (Blueprint $table) {
    //             $table->increments('promotion_id')->comment('id của khuyến mãi');
    //             // $table->string('promotion_title')->index()->comment('tiêu đề khuyến mãi');
    //             // $table->string('promotion_content')->index()->comment('nội dung khuyến mãi');
    //             $table->string('promotion_from')->nullable()->index()->comment('thời gian bắt đầu');
    //             $table->string('promotion_to')->nullable()->index()->comment('thời gian kết thúc');

    //             //foreign key
    //             $table->integer('real_estate_id')->index()->unsigned();
    //             $table->integer('rank_id')->index()->unsigned();
    //             $table->integer('status_id')->index()->unsigned();

    //             $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate');
    //             $table->foreign('rank_id')->references('rank_id')->on('rank');
    //             $table->foreign('status_id')->references('status_id')->on('status');
    //             //log time
    //             $table->timestamp('created_at')
    //             ->default(DB::raw('CURRENT_TIMESTAMP'))
    //             ->comment('ngày tạo');

    //             $table->timestamp('updated_at')
    //             ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
    //             ->comment('ngày cập nhật');

    //             $table->timestamp('deleted_at')
    //             ->nullable()
    //             ->comment('ngày xóa tạm');
    //         });
    //         DB::statement("ALTER TABLE `promotion` comment 'Chương trình khuyến mãi'");
    //     }
    // }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('promotion');
    }
}
