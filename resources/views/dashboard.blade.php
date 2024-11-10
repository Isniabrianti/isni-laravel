@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Header -->
        <div id="carouselHeader" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselHeader" data-bs-slide-to="3"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="header" style="background-image: url('{{ asset('storage/sampul/99.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 95%; height: 550px; margin: 0 auto;">
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="header" style="background-image: url('{{ asset('storage/sampul/88 (2).png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 95%; height: 550px; margin: 0 auto;">
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="header" style="background-image: url('{{ asset('storage/sampul/66.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 95%; height: 550px; margin: 0 auto;">
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="header" style="background-image: url('{{ asset('storage/sampul/10.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 95%; height: 550px; margin: 0 auto;">
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeader" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselHeader" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row mt-4">
            <!-- Card Jumlah Buku -->
            <div class="col-md-6">
                <div class="card custom-card mb-3">
                    <div class="card-header custom-header text-white bg-primary text-center">
                        Jumlah Buku
                    </div>
                    <div class="card-body custom-body bg-white d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h2 class="card-title custom-title">{{ $jumlahBuku }}</h2>
                            <p class="card-text custom-text">Total buku yang tersedia dalam database.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Genre Buku -->
            <div class="col-md-6">
                <div class="card custom-card mb-3">
                    <div class="card-header custom-header text-white bg-primary text-center">
                        Genre Buku
                    </div>
                    <div class="card-body custom-body bg-white d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h2 class="card-title custom-title">Kerajaan, Romansa, Fantasi, dan Aksi</h2>
                            <p class="card-text custom-text">Genre buku yang tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gambar Sampul Buku -->
        <div class="row">
            <div class="col-12">
                <h2 class="my-4">Sampul Buku</h2>
            </div>

            @foreach($bukuSampul as $buku)
                <div class="col-md-3">
                    <div class="card mb-4">
                        @php
                            $defaultSampul = 'default.jpg';
                            $customSampul = [
                                'Obsidian Bride' => 'Obsidian_Bride.jpg',
                                'Lips Upon a Sword\'s Edge' => 'sword.jpeg',
                                'Bastian' => 'bas.jpg',
                                'Not Your Typical Reincarnation Story' => 'cillian.jpeg',   
                                'I Wanna Be U' => 'be u.jpg',
                                'The Second Marriage' => 'navier.jpg',
                                'Suddenly, I Became a Princess' => 'ahty.jpg',
                                'Looking for My One-Night Villainess' => 'uu.jpeg',
                                'I’m Not That Kind of Talent' => 'im not.jpg',
                                'The Little Princess and Her Monster Prince' => 'll.jpeg',
                                'I\'m the Queen in This Life' => 'aria.jpeg',
                                'My In-laws Are Obsessed With Me' => 'ii.jpeg',
                                'High School Soldier' => 'school.jpeg',
                                'White Blood' => 'blood.jpeg',
                                'The Real Lesson' => 'lesson.jpeg',
                                'How to Live as a Lady' => 'lady.jpeg',
                            ];
                            $bookUrls = [
                                'Obsidian Bride' => 'https://www.webtoons.com/id/romantic-fantasy/obsidian-bride/list?title_no=5779',
                                'I Wanna Be U' => 'https://www.webtoons.com/id/romantic-fantasy/i-wanna-be-u/list?title_no=1877',
                                'Lips Upon a Sword\'s Edge' => 'https://www.webtoons.com/id/romantic-fantasy/lips-upon-a-swords-edge/list?title_no=5074',
                                'The Second Marriage' => 'https://www.webtoons.com/id/romantic-fantasy/remarried-queen/list?title_no=1848',
                                'Bastian' => 'https://www.webtoons.com/id/romantic-fantasy/bastian/list?title_no=5280',
                                'Not Your Typical Reincarnation Story' => 'https://www.webtoons.com/id/romantic-fantasy/not-your-typical-reincarnation-story/list?title_no=5502',
                                'Suddenly, I Became a Princess' => 'https://www.webtoons.com/id/romantic-fantasy/became-a-princess/list?title_no=1588',
                                'Looking for My One-Night Villainess' => 'https://www.webtoons.com/id/romantic-fantasy/looking-for-my-one-night-villainess/list?title_no=6353',
                                'I’m Not That Kind of Talent' => 'https://www.webtoons.com/id/fantasy/im-not-that-kind-of-talent/list?title_no=5239',
                                'The Little Princess and Her Monster Prince' => 'https://www.webtoons.com/id/romantic-fantasy/the-little-princess-and-her-monster-prince/list?title_no=4134',
                                'I\'m the Queen in This Life' => 'https://www.webtoons.com/id/romantic-fantasy/im-the-queen-in-this-life/list?title_no=4905',
                                'My In-laws Are Obsessed With Me' => 'https://www.webtoons.com/id/romantic-fantasy/my-inlaws-are-obsessed-with-me/list?title_no=4408',
                                'How to Live as a Lady' => 'https://www.webtoons.com/id/romantic-fantasy/how-to-live-as-a-lady/list?title_no=2663',
                                'The Real Lesson' => 'https://www.webtoons.com/id/action/the-real-lesson/list?title_no=2423',
                                'White Blood' => 'https://www.webtoons.com/id/fantasy/white-blood/list?title_no=1938',
                                'High School Soldier' => 'https://www.webtoons.com/id/action/high-school-soldier/list?title_no=2367',
                            ];
                        @endphp

                        <img src="{{ asset('storage/sampul/' . ($buku->sampul ?? $customSampul[$buku->JudulBuku] ?? $defaultSampul)) }}" 
                             class="card-img-top fixed-size-img" 
                             alt="{{ $buku->JudulBuku }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->JudulBuku }}</h5>
                            <p class="card-text">{{ $buku->Penulis }}</p>
                            
                            @if(isset($bookUrls[$buku->JudulBuku]))
                                <a href="{{ $bookUrls[$buku->JudulBuku] }}" target="_blank" class="btn btn-primary1">Baca Buku</a>
                            @else
                                <a href="#" class="btn btn-secondary disabled">Baca Buku</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CSS for fixed image size -->
        <style>
            .fixed-size-img {
                width: 100%;
                height: 400px;
                object-fit: cover;
            }
        </style>
    </div>
@endsection