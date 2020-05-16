<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_deposit', function (Blueprint $table) {
            $table->increments('dd_id');
            $table->string('dd_code',10)->nullable();

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

            //foreign key
            $table->integer('d_id')->unsigned();
            $table->integer('real_estate_id')->unsigned();
            $table->integer('b_id')->unsigned();

            $table->foreign('b_id')->references('b_id')->on('bank')->onDelete('cascade');
            $table->foreign('d_id')->references('d_id')->on('deposit')->onDelete('cascade');
            $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('detail_deposit');
    }
}
