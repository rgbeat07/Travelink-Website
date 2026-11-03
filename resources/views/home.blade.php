@extends('layouts.app')

@section('title', 'Travelink Wisata - Rancang Perjalanan Eksklusif')
@section('body-class', 'home-app')

@section('content')
    <div class="home-app">
        
        <section id="home" class="hero" @if(!empty($hero->photo_url)) style="background-image: url('{{ $hero->photo_url }}');" @endif>
            <div class="hero-shade"></div>
            <div class="hero-copy">
                <i></i>
                <h1>
                    @if(!empty($hero->title))
                        @php
                            $parts = explode(':', $hero->title, 2);
                        @endphp
                        {{ trim($parts[0]) }}: <span class="fg-inline-italic">{{ trim($parts[1]) }}</span>
                    @elseif(!empty($hero->title))
                        {{ $hero->title }}
                    @else
                        notfound
                    @endif
                </h1>
                <p>
                    @if(!empty($hero->subtitle))
                        {{ $hero->subtitle }}
                    @else
                        notfound
                    @endif
                </p>
                <a href="#contact" class="gold-btn hero-cta">Rancang perjalanan anda</a>
            </div>
        </section>

        <section id="about" class="section about">
            <div class="two-col">
                <div>
                    <span class="section-label">Company Profile</span>
                    <p class="justify">
                        <span class="fg-inline-bold">Travelink Wisata</span> {{ $contact->about_us_text ?? 'lahir sebagai penyedia jasa perjalanan yang mengedepankan fleksibilitas tinggi dan kepuasan personal. Meskipun kami menjadi pilihan utama berbagai institusi perbankan nasional untuk agenda korporat, kami juga melayani perjalanan privat perorangan dan keluarga dengan standar perhatian yang sama tingginya.' }}
                    </p>
                    <div class="vision">
                        <h3>◎ Visi & Misi</h3>
                        <p><span class="fg-inline-bold">Visi:</span> Menjadi biro perjalanan eksklusif paling terpercaya di Indonesia dan Asia Tenggara, yang dikenal atas keunggulan pelayanan ramah serta rute perjalanan kustom berkualitas tinggi.</p>
                        <p><span class="fg-inline-bold">Misi:</span> Menyediakan rute 100% tailor-made sesuai kebutuhan klien, dan menghadirkan pendampingan lapangan (<em>field assistance</em>) yang murah senyum, cekatan, dan memprioritaskan keamanan serta kenyamanan eksekutif.</p>
                    </div>
                </div>
                <div class="legality">
                    <h3>Legalitas & Kredibilitas</h3>
                    <div class="legal-grid">
                        <div><span class="icon">♜</span><b>Izin Usaha</b><small>NIB: 0907250038713</small></div>
                        <div><span class="icon">▤</span><b>Kemenkumham</b><small>NPWP: 02.458.199.3-604.000</small></div>
                        <div><span class="icon">◇</span><b>DJP</b><small>Perusahaan kami telah terdaftar dalam kemenkumham.</small></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section team-section">
            <div class="section-heading">
                <h2>Tim di Balik Layanan Prima</h2>
                <p>Kami digerakkan oleh struktur manajemen in-house yang solid untuk memastikan kontrol kualitas hospitality yang absolut.</p>
            </div>
            <div class="team-grid">
                @foreach($teams as $t)
                    <article>
                        <img src="{{ $t->photo_url }}" alt="{{ $t->name }}">
                        <h3>{{ $t->name }}</h3>
                        <span>{{ $t->job }}</span>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="section portfolio-teaser">
            <div class="section-heading">
                <h2>Kisah Sukses Perjalanan Klien Kami</h2>
                <p>Sekilas rekam jejak penyelenggaraan agenda eksekutif dan incentive tour di berbagai destinasi domestik dan regional.</p>
            </div>
            <div class="teaser-grid">
                @foreach($featuredPortfolios as $x)
                    <a href="{{ route('portfolio') }}">
                        <img src="{{ $x->thumbnail_url }}" alt="{{ $x->title }}">
                        <span><b>▶</b>{{ $x->title }}<small>{{ $x->location }}</small></span>
                    </a>
                @endforeach
            </div>
            <a href="{{ route('portfolio') }}" class="outline-btn">Lihat Seluruh Dokumentasi Perjalanan Kami</a>
        </section>

        <section class="gift-banner">
            <span class="icon">◇</span>
            <h2>Lengkapi Acara Anda dengan Suvenir Eksklusif Kustom</h2>
            <p>Tinggalkan kesan mendalam bagi peserta tour dan eksekutif Anda melalui merchandise premium berlogo institusi Anda.</p>
            <a href="{{ route('katalog-suvenir') }}" class="gold-btn">Lihat Katalog Suvenir</a>
        </section>
    </div>
@endsection