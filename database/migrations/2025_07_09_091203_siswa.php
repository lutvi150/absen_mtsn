<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('nisn')->unique();
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->text('foto')->nullable();
            $table->text('alamat');
            $table->integer('id_kelas');
            // $table->foreign("id_kelas")->references("id")->on("kelas")->onDelete("cascade");
            // $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            // $table->foreign('id_orangtua')->references('id_siswa')->on('orang_tua')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
