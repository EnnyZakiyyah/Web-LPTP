<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('no_peminjaman')->unique();
            $table->string('slug')->unique();
            $table->foreignId('id_peminjam');
            $table->foreignId('id_petugas');
            $table->foreignId('id_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->foreignId('status');
            $table->string('denda')->nullable();
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
        Schema::dropIfExists('peminjamans');
    }
}
