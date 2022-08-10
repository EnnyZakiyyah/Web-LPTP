<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalfavoritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digitalfavorits', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_buku')->nullable()->constrained('koleksidigitals')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_baca');
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
        Schema::dropIfExists('digitalfavorits');
    }
}
