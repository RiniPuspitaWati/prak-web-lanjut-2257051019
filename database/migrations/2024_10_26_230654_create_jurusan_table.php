<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusanTable extends Migration
{
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama_jurusan'); // kolom nama_jurusan
            // $table->foreignId('fakultas_id') // kolom foreign key
            //       ->constrained('fakultas')
            //       ->onDelete('cascade'); // menghapus jurusan jika fakultas dihapus
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
