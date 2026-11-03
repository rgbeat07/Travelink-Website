@extends('layouts.app')

@section('title', 'Portofolio Perjalanan - Travelink Wisata')
@section('body-class', 'catalog-app')

@section('content')
    <div class="catalog-app">

        <main class="catalog-main">
            <div class="catalog-intro">
                <span class="eyebrow">Dokumentasi &amp; Rekam Jejak</span>
                <h1>Portofolio Perjalanan</h1>
                <p>Bukti kerja nyata layanan Corporate Banking &amp; Private Custom Tour. Komitmen penuh pendampingan dengan kenyamanan dan hospitality nomor satu.</p>
            </div>

            <div class="filters">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="domestik">Domestik</button>
                <button class="filter-btn" data-filter="internasional">Internasional</button>
            </div>

            <div class="catalog-grid" id="portfolio-grid">
                @foreach($portfolios as $index => $item)
                    @php
                        $regionSlug = strtolower($item->category);
                        $filterTags = $regionSlug;
                        $label = $item->category;
                        $paxText = is_numeric($item->pax) ? $item->pax . ' Pax' : $item->pax;

                        $videoUrl = $item->video_url;
                        $videoPath = rtrim(Str::before($videoUrl, '?'), '/');
                        $videoId = Str::afterLast($videoPath, '/');
                        $isReel = str_contains($videoUrl, 'instagram.com');

                        if ($isReel) {
                            $videoEmbedUrl = 'https://www.instagram.com/reel/' . $videoId . '/embed';
                        } else {
                            if (str_contains($videoUrl, 'v=')) {
                                $videoId = Str::before(Str::after($videoUrl, 'v='), '&');
                            }
                            $videoEmbedUrl = 'https://www.youtube-nocookie.com/embed/' . $videoId . '?autoplay=1';
                        }

                        $itemJson = json_encode([
                            'id' => $item->id,
                            'title' => $item->title,
                            'label' => $label,
                            'location' => $item->location,
                            'pax' => $paxText,
                            'duration' => $item->duration,
                            'description' => $item->summary,
                            'image' => $item->thumbnail_url,
                            'video_embed_url' => $videoEmbedUrl,
                            'is_reel' => $isReel,
                            'hotel' => $item->hotel,
                        ]);
                    @endphp
                    <article class="catalog-card" data-filter-tags="{{ $filterTags }}">
                        <div class="card-image">
                            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}">
                            <span>{{ $label }}</span>
                            <div class="play" onclick='openPortfolioModal({{ $itemJson }})'>▶</div>
                        </div>
                        <div class="card-copy">
                            <small>◆ {{ $item->location }}</small>
                            <h3>{{ $item->title }}</h3>
                            <p class="meta">● {{ $paxText }} &nbsp;&nbsp; ◷ {{ $item->duration }}</p>
                        </div>
                        <button class="card-btn" onclick='openPortfolioModal({{ $itemJson }})'>
                            Lihat Detail Video &nbsp;→
                        </button>
                    </article>
                @endforeach
            </div>
        </main>
    </div>
@endsection

@section('modals')
    <div id="portfolio-modal-backdrop" class="modal-backdrop" style="display: none;" onclick="closePortfolioModal(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <button class="modal-x" onclick="closePortfolioModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div>
                <div class="modal-image" id="modal-image-container">
                    <img id="modal-portfolio-img" src="" alt="">
                    <span id="modal-play-btn" onclick="playPortfolioVideo()">▶</span>
                </div>
                <div class="modal-content">
                    <small id="modal-portfolio-label">Corporate Banking</small>
                    <h2 id="modal-portfolio-title">Judul Portofolio</h2>
                    <b class="location" id="modal-portfolio-location">◆ Nusa Dua, Bali</b>
                    <p id="modal-portfolio-desc">Deskripsi perjalanan...</p>
                    <div class="spec-grid">
                        <span><small>Durasi Program</small><span id="modal-portfolio-duration">3 Hari 2 Malam</span></span>
                        <span><small>Akomodasi</small><span id="modal-portfolio-hotel">The Mulia Resort (*****)</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentVideoEmbedUrl = '';
    let currentIsReel = false;
    let currentImgUrl = '';
    let currentTitle = '';

    document.querySelectorAll('.filters .filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filters .filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            const cards = document.querySelectorAll('#portfolio-grid .catalog-card');

            cards.forEach(card => {
                if (filter === 'all') {
                    card.style.display = 'flex';
                } else {
                    const tags = card.getAttribute('data-filter-tags') || '';
                    if (tags.includes(filter)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    });

    function openPortfolioModal(item) {
        currentVideoEmbedUrl = item.video_embed_url;
        currentIsReel = item.is_reel;
        currentImgUrl = item.image || item.thumbnail_url;
        currentTitle = item.title;

        document.getElementById('modal-portfolio-label').innerText = item.label;
        document.getElementById('modal-portfolio-title').innerText = currentTitle;
        document.getElementById('modal-portfolio-location').innerText = '◆ ' + (item.location);
        document.getElementById('modal-portfolio-desc').innerText = item.description || item.summary;
        document.getElementById('modal-portfolio-duration').innerText = item.duration;
        document.getElementById('modal-portfolio-hotel').innerText = item.hotel;

        const container = document.getElementById('modal-image-container');
        container.classList.remove('reel');
        container.innerHTML = `
            <img id="modal-portfolio-img" src="${currentImgUrl}" alt="${currentTitle}">
            <span id="modal-play-btn" onclick="playPortfolioVideo()">▶</span>
        `;

        document.getElementById('portfolio-modal-backdrop').style.display = 'grid';
        document.body.style.overflow = 'hidden';
    }

    function playPortfolioVideo() {
        if (!currentVideoEmbedUrl) return;
        const container = document.getElementById('modal-image-container');
        if (currentIsReel) {
            container.classList.add('reel');
        }
        container.innerHTML = `
            <iframe src="${currentVideoEmbedUrl}"
                    title="${currentTitle}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        `;
    }

    function closePortfolioModal(e) {
        if (e && e.target !== e.currentTarget && !e.target.classList.contains('modal-x')) return;
        const container = document.getElementById('modal-image-container');
        container.innerHTML = '';
        document.getElementById('portfolio-modal-backdrop').style.display = 'none';
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePortfolioModal();
        }
    });
</script>
@endpush