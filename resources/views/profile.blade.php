@extends('layouts.app')

@section('content')
<div class="container mt-5" style="min-height: 100vh; margin-left: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-1">
            <!-- Card Profil -->
            <div class="card" style="margin-top: 50px;">
                <div class="card-header bg-primary text-white font-weight-bold">
                    Akun Profil
                </div>
                <div class="card-body">
                    <!-- Informasi Profil -->
                    <div id="profileInfo">
                        <div class="text-center mb-3">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Foto Profil" id="profilePicturePreview">
                            @else
                                <img src="{{ asset('default-profile.png') }}" alt="Default Profil" id="profilePicturePreview">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="{{ Auth::user()->username }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <button type="button" class="btn btn-primay" id="editProfileBtn">Edit Profil</button>
                    </div>

                    <!-- Form Edit Profil -->
                    <div id="editProfileForm" style="display: none;">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                            
                            <!-- Foto Profil  -->
                            <div class="form-group text-center mb-3">
                                @if (Auth::user()->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Foto Profil" id="editProfilePicturePreview">
                                @else
                                    <img src="{{ asset('default-profile.png') }}" alt="Default Profil" id="editProfilePicturePreview">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="profile_picture">Ubah Foto Profil</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture" onchange="previewProfilePicture(event)">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>

                            <button type="submit" class="btn btn-primay">Simpan Perubahan</button>
                            <button type="button" class="btn btn-secondary" id="cancelEditProfile">Batal</button>
                        </form>
                    </div>

                    <!-- JavaScript  -->
                    <script>
                        document.getElementById('editProfileBtn').addEventListener('click', function() {
                            document.getElementById('profileInfo').style.display = 'none';
                            document.getElementById('editProfileForm').style.display = 'block';
                        });

                        document.getElementById('cancelEditProfile').addEventListener('click', function() {
                            document.getElementById('editProfileForm').style.display = 'none';
                            document.getElementById('profileInfo').style.display = 'block';
                        });

                        function previewProfilePicture(event) {
                            var reader = new FileReader();
                            reader.onload = function(){
                                var output = document.getElementById('editProfilePicturePreview');
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsectionx