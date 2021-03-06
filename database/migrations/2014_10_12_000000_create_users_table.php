<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_ktp')->unique();
            $table->string('tempat_lahir');
            $table->string('jk');
            $table->date('tgl_lahir');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->string('alamat');
            $table->string('unit_kerja');
            $table->string('image_bukti')->nullable();
            $table->string('image_foto')->nullable();
            $table->string('alasan')->nullable();
            $table->boolean('approved')->default(false)->nullable();
            $table->integer('id_petugas_approved')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
