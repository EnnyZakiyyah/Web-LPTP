<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksidigitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksidigitals', function (Blueprint $table) {
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
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('image')->nullable();
            $table->longText('filekatalog');
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
        Schema::dropIfExists('koleksidigitals');
    }
}
