<?php

use App\Models\Institution;
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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Institution::class)->constrained();
            $table->string('nomor_surat');
            $table->string('lampiran')->nullable();
            $table->string('perihal');
            $table->string('tujuan');
            $table->text('start_surat');
            $table->date('tgl_pelaksanaan');
            $table->time('waktu_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->string('end_surat');
            $table->string('lokasi_pembuatan')->default('Sumenep');
            $table->string('nama_pembuat');
            $table->string('nip_pembuat')->nullable();
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
        Schema::dropIfExists('letters');
    }
};
