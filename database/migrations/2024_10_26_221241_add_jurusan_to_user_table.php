<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->foreignId('jurusan_id') // kolom foreign key
                  ->nullable()
                  ->constrained('jurusan')
                  ->onDelete('set null'); // mengatur jurusan_id menjadi null jika jurusan dihapus
        });
    }

    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn('jurusan_id');
        });
    }

};
