@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1 style="font-size: 28px;">Edit Data Buku</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Buku</h3>
                        </div>
                        <form action="{{ route('buku.update', $buku->idbuku) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="JudulBuku">Judul Buku</label>
                                    <input type="text" name="JudulBuku" class="form-control" id="JudulBuku" value="{{ $buku->JudulBuku }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="JenisBuku">Jenis Buku</label>
                                    <input type="text" name="JenisBuku" class="form-control" id="JenisBuku" value="{{ $buku->JenisBuku }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Penulis">Penulis</label>
                                    <input type="text" name="Penulis" class="form-control" id="Penulis" value="{{ $buku->Penulis }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Episode">Episode</label>
                                    <input type="number" name="Episode" class="form-control" id="Episode" value="{{ $buku->Episode }}" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
