@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<h2>Edit Berita</h2>

<form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="judul_id">Judul (ID)</label>
        <input type="text" class="form-control" id="judul_id" name="judul_id" value="{{ $berita->judul_id }}" required>
    </div>
    <div class="form-group">
        <label for="judul_en">Judul (EN)</label>
        <input type="text" class="form-control" id="judul_en" name="judul_en" value="{{ $berita->judul_en }}" required>
    </div>
    <div class="form-group">
        <label for="isi_id">Isi (ID)</label>
        <textarea class="form-control" id="isi_id" name="isi_id" rows="4" required>{{ $berita->isi_id }}</textarea>
    </div>
    <div class="form-group">
        <label for="isi_en">Isi (EN)</label>
        <textarea class="form-control" id="isi_en" name="isi_en" rows="4" required>{{ $berita->isi_en }}</textarea>
    </div>
    <div class="form-group">
        <label for="nama_file">Upload File</label>
        <input type="file" class="form-control-file" id="nama_file" name="nama_file">
        <p class="mt-2">File saat ini: {{ basename($berita->nama_file) }}</p>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
