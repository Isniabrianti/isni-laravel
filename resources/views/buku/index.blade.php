@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Buku</h2>
        <!-- button tambah buku hanya bisa diakses oleh admin -->
        @if(Auth::user() && Auth::user()->role == 'admin')
            <a href="{{ route('buku.create') }}" class="btn btn-succes">Tambah Buku</a>
        @endif
    </div>

    <table class="table table-bordered" style="border-collapse: collapse;">
        <thead style="background-color: #b3e5fc;">
            <tr>
                <th style="border-right: 1px solid #ddd;">Id</th>
                <th style="border-right: 1px solid #ddd;">Judul Buku</th>
                <th style="border-right: 1px solid #ddd;">Genre Buku</th>
                <th style="border-right: 1px solid #ddd;">Penulis</th>
                <th style="border-right: 1px solid #ddd;">Episode</th>
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <th style="border-right: 1px solid #ddd;">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $b)
            <tr>
                <td style="border-right: 1px solid #ddd;">{{ $b->idbuku }}</td>
                <td style="border-right: 1px solid #ddd;">{{ $b->JudulBuku }}</td>
                <td style="border-right: 1px solid #ddd;">{{ $b->JenisBuku }}</td>
                <td style="border-right: 1px solid #ddd;">{{ $b->Penulis }}</td>
                <td style="border-right: 1px solid #ddd;">{{ $b->Episode }}</td>

                <!-- button untuk edit dan hapus data buku hanya bisa diakses oleh admin -->
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <td style="border-right: 1px solid #ddd;">
                        <a href="{{ route('buku.edit', $b->idbuku) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $b->idbuku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
