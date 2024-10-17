<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
{
    $language = session('app_language', 'id'); // Default ke Bahasa Indonesia
    $berita = Berita::where('dihapus', 'T')->get();

    return view('berita.index', compact('berita', 'language'));
}


    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_id' => 'required',
            'judul_en' => 'required',
            'isi_id' => 'required',
            'isi_en' => 'required',
            'nama_file' => 'file|mimes:jpg,png,pdf|max:2048',
        ]);

        $fileName = $request->file('nama_file')->store('uploads');

        Berita::create([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'isi_id' => $request->isi_id,
            'isi_en' => $request->isi_en,
            'nama_file' => $fileName,
            'dihapus' => 'T',
        ]);

        return redirect()->route('berita.index');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $request->validate([
            'judul_id' => 'required',
            'judul_en' => 'required',
            'isi_id' => 'required',
            'isi_en' => 'required',
            'nama_file' => 'file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('nama_file')) {
            Storage::delete($berita->nama_file);
            $fileName = $request->file('nama_file')->store('uploads');
            $berita->nama_file = $fileName;
        }

        $berita->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'isi_id' => $request->isi_id,
            'isi_en' => $request->isi_en,
        ]);

        return redirect()->route('berita.index');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->dihapus = 'Y';
        $berita->save();

        return redirect()->route('berita.index');
    }
}
