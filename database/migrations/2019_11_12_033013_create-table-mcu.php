<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMcu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('const_id');
            $table->string('kdMCU');
            $table->string('noKunjungan');
            $table->string('kdProvider');
            $table->string('tglPelayanan');
            $table->integer('tekananDarahSistole');
            $table->integer('tekananDarahDiastole');
            $table->integer('radiologiFoto');
            $table->integer('darahRutinHemo');
            $table->integer('darahRutinLeu');
            $table->integer('darahRutinErit');
            $table->integer('darahRutinLaju');
            $table->integer('darahRutinHema');
            $table->integer('darahRutinTrom');
            $table->integer('lemakDarahHDL');
            $table->integer('lemakDarahLDL');
            $table->integer('lemakDarahChol');
            $table->integer('lemakDarahTrigli');
            $table->integer('gulaDarahSewaktu');
            $table->integer('gulaDarahPuasa');
            $table->integer('gulaDarahPostPrandial');
            $table->integer('gulaDarahHbA1c');
            $table->integer('fungsiHatiSGOT');
            $table->integer('fungsiHatiSGPT');
            $table->integer('fungsiHatiGamma');
            $table->integer('fungsiHatiProtKual');
            $table->integer('fungsiHatiAlbumin');
            $table->integer('fungsiGinjalCrea');
            $table->integer('fungsiGinjalUreum');
            $table->integer('fungsiGinjalAsam');
            $table->integer('fungsiJantungABI');
            $table->integer('fungsiJantungEKG');
            $table->integer('fungsiJantungEcho');
            $table->integer('funduskopi');
            $table->string('pemeriksaanLain');
            $table->string('keterangan');
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
        Schema::dropIfExists('mcu');
    }
}
