<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $lembaga = [
            'MTs Annuqayah Late I',
            'MTs Annuqayah Late II',
            'MA Annuqayah Late I',
            'MA Annuqayah Late II',
        ];
        foreach ($lembaga as $key => $value) {
            Institution::create([
                'nama' => $value,
                'alamat' => 'Guluk Guluk Timur I, Guluk-guluk, Sumenep, Kabupaten Sumenep, Jawa Timur',
                'kode_pos' => '69463',
                'telepon' => '0877-8787-1887',
                'email' => Str::slug($value).'@gmail.com',
                'logo' => 'logo-late.png',
            ]);
        }
        \App\Models\Position::factory(10)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\IncomingMail::create([
            'institution_id' => 1,
            'file_name' => 'test.pdf',
        ]);
        \App\Models\Letter::create([
            'institution_id' => 1,
            'nomor_surat' => 'S/1/2022/Mts/1',
            'perihal' => 'Surat Pemberitahuan',
            'tujuan' => 'Undangan Rapat',
            'start_surat' => 'Assalamialaikum Wr. Wb.<br>Surat ini dibuat untuk mengundang rapat untuk mengajukan permohonan pembuatan surat pemberitahuan',
            'tgl_pelaksanaan' => Carbon::now()->format('Y-m-d'),
            'waktu_pelaksanaan' => Carbon::now()->format('H:i'),
            'tempat_pelaksanaan' => 'Aula MTs Annuqayah Late I',
            'end_surat' => 'Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.',
            'nama_pembuat' => 'Yusuf',
            'nip_pembuat' => '123456789',
        ]);
    }
}
