@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Berita</h2>
    <a href="{{ route('berita.create') }}" class="btn btn-success">Tambah Berita</a>
</div>

@if($berita->isEmpty())
    <div class="alert alert-warning">Tidak ada berita yang tersedia.</div>
@else
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>{{ $language == 'id' ? 'Judul (ID)' : 'Judul (EN)' }}</th>
                <th>Nama File</th>
                <th>Waktu Dibuat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($berita as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $language == 'id' ? $item->judul_id : $item->judul_en }}</td>
                    <td>{{ $item->nama_file }}</td>
                    <td>{{ $language == 'id' ? $item->created_at->format('d-m-Y H:i:s') : $item->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
