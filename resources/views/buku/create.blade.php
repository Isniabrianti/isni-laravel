@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center"> 
                    <h1 style="font-size: 28px;">Tambah Buku</h1> 
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
                            <h4 class="card-title">Form Tambah Buku</h3>
                        </div>
                        <form action="{{ route('buku.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Judul Buku -->
                                <div class="form-group1">
                                    <label for="JudulBuku">Judul Buku</label>
                                    <input type="text" name="JudulBuku" class="form-control" id="JudulBuku" placeholder="Masukkan Judul Buku">
                                </div>
                                <!-- Jenis Buku -->
                                <div class="form-group1">
                                    <label for="JenisBuku">Jenis Buku</label>
                                    <input type="text" name="JenisBuku" class="form-control" id="JenisBuku" placeholder="Masukkan Jenis Buku">
                                </div>
                                <!-- Penulis -->
                                <div class="form-group1">
                                    <label for="Penulis">Penulis</label>
                                    <input type="text" name="Penulis" class="form-control" id="Penulis" placeholder="Masukkan Penulis">
                                </div>
                                <!-- Episode -->
                                <div class="form-group1">
                                    <label for="Episode">Episode</label>
                                    <input type="number" name="Episode" class="form-control" id="Episode" placeholder="Masukkan Jumlah Episode">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection