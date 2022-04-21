<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengirim')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penerima')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['baru', 'dibaca', 'terkirim']);
            $table->text('isi');
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
        Schema::dropIfExists('pesan');
    }
}
