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
            $table->foreignId('id_peminjam')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_petugas')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_buku')->constrained('katalogs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_lokasi')->constrained('lokasis')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->foreignId('id_status')->constrained('statuses')->onDelete('cascade')->onUpdate('cascade');
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
