<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistTempTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('wishlist_temp')) {
            Schema::create('wishlist_temp', function (Blueprint $table) {
                $table->increments('wishlist_temp_id')->comment('id của danh sách yêu thích');

                //foreign key
                $table->integer('real_estate_id')->index()->unsigned();
                $table->integer('cookie_user_id')->index()->unsigned();

                $table->foreign('real_estate_id')->references('real_estate_id')->on('real_estate')->onDelete('cascade');
                $table->foreign('cookie_user_id')->references('cookie_user_id')->on('cookie_user')->onDelete('cascade');

            });
            DB::statement("ALTER TABLE `wishlist_temp` comment 'Danh sách yêu thích'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('wishlist_temp_temp');
    }
}
