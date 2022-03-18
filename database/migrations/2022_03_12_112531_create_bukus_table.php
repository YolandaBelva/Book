<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahunterbit')->nullable();
            $table->integer('jumlahhalaman')->nullable();
            $table->integer('ukuran')->nullable();
            $table->text('sinopsis')->nullable();

            $table->string('cover')->nullable();
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
        Schema::dropIfExists('bukus');
    }
};
