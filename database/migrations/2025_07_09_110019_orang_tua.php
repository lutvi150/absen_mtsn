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
        Schema::create("orang_tua", function (Blueprint $table) {
            $table->id();
            $table->integer("id_siswa");
            $table->string("nama");
            $table->enum("jenis", ["Ayah", "Ibu"])->default("Ayah");
            $table->string("pekerjaan");
            $table->string("alamat");
            $table->string("no_hp");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("orang_tua");
    }
};
