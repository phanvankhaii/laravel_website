<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_gia');
            $table->string('product_soluong');
            $table->string('product_image');
            $table->string('product_hdh');
            $table->string('product_CPU');
            $table->string('product_GPU');
            $table->string('product_RAM');
            $table->string('product_ROM');
            $table->string('product_manhinh');
            $table->string('product_camera');
            $table->string('product_conggiaotiep');
            $table->string('product_congxuat');
            $table->string('product_pin');
            $table->string('product_bluetooth');
            $table->string('product_WIFI');
            $table->string('product_LAN');
            $table->string('product_baomat');
            $table->string('product_amthanh');
            $table->string('product_ledbanphim');
            $table->string('product_kichthuoc');
            $table->string('product_khoiluong');
            $table->string('product_baohanh');
            $table->string('product_hang');
            $table->text('product_mota');
            $table->integer('product_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
