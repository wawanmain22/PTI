<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_id', 255);
            $table->string('judul_en', 255);
            $table->text('isi_id');
            $table->text('isi_en');
            $table->string('nama_file');
            $table->enum('dihapus', ['Y', 'T'])->default('T');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};
