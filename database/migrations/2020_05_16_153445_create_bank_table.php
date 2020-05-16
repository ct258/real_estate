<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->increments('b_id');
            $table->decimal('b_txnref',18,4)->nullable();
            $table->integer('b_orderInfo')->nullable();
            $table->float('b_amount')->nullable();
            $table->float('b_responseCode')->nullable();
            $table->float('b_bankcode')->nullable();
            $table->float('b_accountnumber')->nullable();
            $table->float('b_membersince')->nullable();
            $table->float('b_name')->nullable();

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
            // $table->integer('dd_id')->unsigned();

            // $table->foreign('dd_id')->references('dd_id')->on('detail_deposit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('bank');
    }
}
