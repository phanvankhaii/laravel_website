<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPhiship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phiship', function (Blueprint $table) {
            $table->Increments('id_phiship');
            $table->integer('matinhthanh');
            $table->integer('maquanhuyen');
            $table->integer('maxaphuong');
            $table->string('tienphi');
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
        Schema::dropIfExists('tbl_phiship');
    }
}
