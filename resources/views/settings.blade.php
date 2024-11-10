@extends('layouts.app')

@section('content')
<div class="container">
   <!-- Akun Section -->
    <div class="card mb-3">
        <div class="card-header font-weight-bold">
            Akun
        </div>
        <div class="card-body">
            <!-- Informasi Pengguna -->
            <div class="mt-3">
                <h5>{{ Auth::user()->username }}</h5>
                <p>{{ Auth::user()->email }}</p>
            </div>

            <!-- Tombol Edit -->
            <a href="{{ route('profile') }}" class="btn btn-primarry">Edit Profil</a>
        </div>
    </div>

    <!-- Tentang Website Section -->
    <div class="card">
        <div class="card-header font-weight-bold">
            Tentang Website
        </div>
        <div class="card-body">
            <p>Website ini merupakan perpustakaan online yang menyediakan berbagai buku dalam berbagai genre, termasuk romansa, fantasi, dan lainnya.</p>
            <p>Versi 1.0.0</p>
        </div>
    </div>

    <div class="card-footer text-right">
        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger2">Logout</button>
        </form>
    </div>
</div>
@endsection
