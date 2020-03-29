<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('view_product')) {
            Schema::create('view_product', function (Blueprint $table) {
                $table->increments('view_product_id')->comment('id của danh sách yêu thích');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('cookie_user_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade')->onDelete('cascade');
                $table->foreign('cookie_user_id')->references('cookie_user_id')->on('cookie_user')->onDelete('cascade')->onDelete('cascade');
                
            });
            DB::statement("ALTER TABLE `view_product` comment 'Sản phẩm đã xem'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_product');
    }
}
