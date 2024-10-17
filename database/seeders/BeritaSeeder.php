<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berita::create([
            'judul_id' => 'Berita Pertama ID',
            'judul_en' => 'First News EN',
            'isi_id' => 'Ini adalah isi berita pertama dalam bahasa Indonesia.',
            'isi_en' => 'This is the content of the first news in English.',
            'nama_file' => 'contoh-file.pdf',
            'dihapus' => 'T',
        ]);

        Berita::create([
            'judul_id' => 'Berita Kedua ID',
            'judul_en' => 'Second News EN',
            'isi_id' => 'Ini adalah isi berita kedua dalam bahasa Indonesia.',
            'isi_en' => 'This is the content of the second news in English.',
            'nama_file' => 'contoh-file-2.pdf',
            'dihapus' => 'T',
        ]);
    }
}
