@extends('layouts.app')

@section('content')
    <h3>Hasil Pencarian untuk "{{ $query }}"</h3>

    @if($results->isEmpty())
        <p>Tidak ada hasil ditemukan.</p>
    @else
        <div class="row">
            @foreach ($results as $buku)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <!-- Menampilkan gambar sampul -->
                        <img src="{{ asset('storage/sampul/' . $buku->SampulBuku) }}" class="card-img-top img-fluid" alt="Sampul Buku {{ $buku->JudulBuku }} style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->JudulBuku }}</h5>
                            <p class="card-text">Jenis: {{ $buku->JenisBuku }}</p>
                            <p class="card-text">Penulis: {{ $buku->Penulis }}</p>
                            <p class="card-text">Episode: {{ $buku->Episode }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection