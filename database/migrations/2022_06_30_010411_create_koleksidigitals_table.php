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
            $table->string('author_id');
            // $table->foreignId('author_id')->constrained('authors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('edisi')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('image')->nullable();
            $table->longText('filekatalog')->nullable();
            $table->text('body')->nullable();
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
