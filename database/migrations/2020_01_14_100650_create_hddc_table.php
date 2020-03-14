<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHddcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('hddc')) {
            Schema::create('hddc', function (Blueprint $table) {
                $table->Increments('hddc_id')->comment('id của hợp đồng đặt cọc');
                $table->string('hddc_ma')->comment('mã hợp đồng đặt cọc');
                $table->integer('hddc_tiencoc')->unsigned()->comment('tiền cọc');
                $table->string('hddc_ngaydc')->comment('ngày đặt cọc');
 
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
                // Setting unique
                

            });
            DB::statement("ALTER TABLE `hddc` comment 'Hợp đồng đặt cọc'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
