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
        Schema::create('incoming_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Institution::class)->constrained();
            $table->date('tanggal_masuk')->nullable()->default(date('Y-m-d'));
            $table->enum('jenis_surat', ['Internal', 'Eksternal']);
            $table->string('nomor_surat');
            $table->string('perihal');
            $table->string('lampiran')->nullable();
            $table->string('tujuan');
            $table->string('cq')->nullable();
            $table->string('tembusan')->nullable();
            $table->string('file_name');
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
        Schema::dropIfExists('incoming_mails');
    }
};
