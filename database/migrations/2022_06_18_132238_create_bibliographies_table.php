<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliographies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('edisi');
            $table->string('isbn');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('tempat_terbit');
            $table->string('jumlah');
            $table->string('bahasa');
            $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->string('image')->nullable();
            $table->text('body');
            $table->timestamp('publish_at')->nullable();
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
        Schema::dropIfExists('bibliographies');
    }
}
