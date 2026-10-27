@props(['isCatalog' => false, 'current' => ''])

<nav class="home-nav {{ $isCatalog ? 'catalog-home-nav' : '' }}">
    <div>
        <a href="{{ route('home') }}" class="wordmark">Travelink <span>Wisata</span></a>
        <div class="home-links">
            <a href="{{ route('home') }}#about">Tentang Kami</a>
            <a href="{{ route('portofolio') }}" class="{{ $current === 'portfolio' ? 'current' : '' }}">Portofolio</a>
            <a href="{{ route('katalog-suvenir') }}" class="{{ $current === 'gifting' ? 'current' : '' }}">Katalog Suvenir</a>
            <a href="#contact">Kontak</a>
        </div>
    </div>
</nav>

