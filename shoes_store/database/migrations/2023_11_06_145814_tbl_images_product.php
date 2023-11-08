<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblImagesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_images_product', function (Blueprint $table) {
            $table->increments('img_pro_id');
            $table->integer('product_id');
            $table->string('img_product',100);
            $table->string('img_position',3);
            $table->string('img_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_images_product');
    }
}
