@extends('layouts.app')

@section('title', 'Travelink Wisata - Rancang Perjalanan Eksklusif')
@section('body-class', 'home-app')

@section('content')
    <div class="home-app">
        <x-header :isCatalog="false" />

        <section id="home" class="hero" @if(!empty($hero->photo_url)) style="background-image: url('{{ $hero->photo_url }}');" @endif>
            <div class="hero-shade"></div>
            <div class="hero-copy">
                <i></i>
                <h1>
                    @if(!empty($hero->title) && str_contains($hero->title, ':'))
                        @php
                            $parts = explode(':', $hero->title, 2);
                        @endphp
                        {{ trim($parts[0]) }}:&nbsp;&nbsp;<span class="fg-inline-italic">{{ trim($parts[1]) }}</span>
                    @elseif(!empty($hero->title))
                        {{ $hero->title }}
                    @else
                        Rancang Perjalanan Eksklusif:&nbsp;&nbsp;<span class="fg-inline-italic">Dari Event Korporat Hingga Private Tour</span>
                    @endif
                </h1>
                <p>
                    @if(!empty($hero->subtitle))
                        {{ $hero->subtitle }}
                    @else
                        Spesialis penyedia jasa travel <span class="fg-inline-italic">tailor-made</span> sesuai kehendak Anda. Menghadirkan standar <span class="fg-inline-bold">hospitality nomor satu</span>, pelayanan ramah penuh perhatian, dan keandalan terbaik untuk korporat perbankan maupun perjalanan perorangan &amp; keluarga.
                    @endif
                </p>
                <a href="#contact" class="gold-btn hero-cta">Rancang perjalanan anda</a>
            </div>
        </section>

        <section id="about" class="section about">
            <div class="two-col">
                <div>
                    <span class="section-label">Company Profile</span>
                    <h2></h2>
                    <p class="justify">
                        <span class="fg-inline-bold">Travelink Wisata</span> {{ $contact->about_us_text ?? 'lahir sebagai penyedia jasa perjalanan yang mengedepankan fleksibilitas tinggi dan kepuasan personal. Meskipun kami menjadi pilihan utama berbagai institusi perbankan nasional untuk agenda korporat, kami juga melayani perjalanan privat perorangan dan keluarga dengan standar perhatian yang sama tingginya.' }}
                    </p>
                    <div class="vision">
                        <h3>◎ &nbsp; Visi &amp; Misi</h3>
                        <p><span class="fg-inline-bold">Visi:</span> Menjadi biro perjalanan eksklusif paling terpercaya di Indonesia dan Asia Tenggara, yang dikenal atas keunggulan pelayanan ramah serta rute perjalanan kustom berkualitas tinggi.</p>
                        <p><span class="fg-inline-bold">Misi:</span> Menyediakan rute 100% tailor-made sesuai kebutuhan klien, dan menghadirkan pendampingan lapangan (<em>field assistance</em>) yang murah senyum, cekatan, dan memprioritaskan keamanan serta kenyamanan eksekutif.</p>
                    </div>
                </div>
                <div class="legality">
                    <h3>Legalitas &amp; Kredibilitas</h3>
                    <div class="legal-grid">
                        <div><span class="icon">♜</span><b>NIB Resmi</b><small>Kementerian Investasi / BKPM</small></div>
                        <div><span class="icon">▤</span><b>Izin Biro Perjalanan</b><small>Kementerian Pariwisata</small></div>
                        <div><span class="icon">◇</span><b>Member of ASITA</b><small>Asosiasi Travel Indonesia</small></div>
                        <div><span class="icon">▥</span><b>Vendor Terdaftar</b><small>Rekanan Bank Nasional</small></div>
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
                @forelse($teams as $t)
                    <article>
                        <img src="{{ $t->photo_url }}" alt="{{ $t->name }}">
                        <h3>{{ $t->name }}</h3>
                        <span>{{ $t->job }}</span>
                    </article>
                @empty
                    <article><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&q=80" alt="Bpk. Adhitama"><h3>Bpk. Adhitama</h3><span>Direktur Utama</span></article>
                    <article><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80" alt="Ibu Sarah K."><h3>Ibu Sarah K.</h3><span>Manajer Operasional</span></article>
                    <article><img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80" alt="Bpk. Reza P."><h3>Bpk. Reza P.</h3><span>Head of Hospitality & Tour</span></article>
                    <article><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300&q=80" alt="Ibu Nisa A."><h3>Ibu Nisa A.</h3><span>Manajer Finance (B2B)</span></article>
                @endforelse
            </div>
        </section>

        <section class="section portfolio-teaser">
            <div class="section-heading">
                <h2>Kisah Sukses Perjalanan Klien Kami</h2>
                <p>Sekilas rekam jejak penyelenggaraan agenda eksekutif dan incentive tour di berbagai destinasi domestik dan regional.</p>
            </div>
            <div class="teaser-grid">
                @forelse($featuredPortfolios as $x)
                    <a href="{{ route('portofolio') }}">
                        <img src="{{ $x->thumbnail_url }}" alt="{{ $x->title }}">
                        <span><b>▶</b>{{ $x->title }}<small>{{ $x->location }}</small></span>
                    </a>
                @empty
                    <a href="{{ route('portofolio') }}"><img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1000&q=85" alt="Outing & Gala Dinner Bank BCA"><span><b>▶</b>Outing & Gala Dinner Bank BCA<small>Nusa Dua, Bali</small></span></a>
                    <a href="{{ route('portofolio') }}"><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1000&q=85" alt="Private Luxury Family Tour"><span><b>▶</b>Private Luxury Family Tour<small>Labuan Bajo, NTT</small></span></a>
                    <a href="{{ route('portofolio') }}"><img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=85" alt="Executive Incentive Trip Bank Mandiri"><span><b>▶</b>Executive Incentive Trip Bank Mandiri<small>Singapore & Da Nang</small></span></a>
                @endforelse
            </div>
            <a href="{{ route('portofolio') }}" class="outline-btn">Lihat Seluruh Dokumentasi Perjalanan Kami</a>
        </section>

        <section class="gift-banner">
            <span class="icon">◇</span>
            <h2>Lengkapi Acara Anda dengan Suvenir Eksklusif Kustom</h2>
            <p>Tinggalkan kesan mendalam bagi peserta tour dan eksekutif Anda melalui merchandise premium berlogo institusi Anda.</p>
            <a href="{{ route('katalog-suvenir') }}" class="gold-btn">Lihat Katalog Suvenir</a>
        </section>
    </div>
@endsection

