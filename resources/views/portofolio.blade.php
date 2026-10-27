@extends('layouts.app')

@section('title', 'Portofolio Perjalanan - Travelink Wisata')
@section('body-class', 'catalog-app')

@section('content')
    <div class="catalog-app">
        <x-header :isCatalog="true" current="portfolio" />

        <main class="catalog-main">
            <div class="catalog-intro">
                <span class="eyebrow">Dokumentasi &amp; Rekam Jejak</span>
                <h1>Portofolio Perjalanan</h1>
                <p>Bukti kerja nyata layanan Corporate Banking &amp; Private Custom Tour. Komitmen penuh pendampingan dengan kenyamanan dan hospitality nomor satu.</p>
            </div>

            <div class="filters">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="corporate">Corporate &amp; Perbankan</button>
                <button class="filter-btn" data-filter="private">Private &amp; Family</button>
                <button class="filter-btn" data-filter="domestik">Domestik</button>
                <button class="filter-btn" data-filter="internasional">Internasional</button>
            </div>

            <div class="catalog-grid" id="portfolio-grid">
                @forelse($portfolios as $index => $item)
                    @php
                        $regionSlug = strtolower($item->category->category_name ?? ($index % 2 === 0 ? 'domestik' : 'internasional'));
                        $isPrivate = stripos($item->title, 'family') !== false || stripos($item->title, 'honeymoon') !== false || stripos($item->title, 'private') !== false;
                        $catSlug = $isPrivate ? 'private' : 'corporate';
                        $filterTags = $regionSlug . ' ' . $catSlug;
                        $label = $item->category->category_name ?? ($isPrivate ? 'Private & Family' : 'Corporate Banking');
                        $paxText = is_numeric($item->pax) ? $item->pax . ' Pax' : $item->pax;
                        $itemJson = json_encode([
                            'id' => $item->id,
                            'title' => $item->title,
                            'label' => $label,
                            'location' => $item->location,
                            'pax' => $paxText,
                            'duration' => $item->duration,
                            'description' => $item->summary ?? $item->description ?? '',
                            'image' => $item->thumbnail_url ?? $item->image ?? '',
                            'yt_vid_id' => $item->yt_vid_id ?? 'LXb3EKWsInQ',
                            'hotel' => $item->hotel ?? 'The Mulia Resort (*****) / Private Phinisi',
                            'arrangements' => $item->arrangements ?? 'Exclusive Beachfront Gala Dinner, Outbound Team Building, VIP Escort'
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
                @empty
                    @php
                        $fallbackPortfolio = [
                            ['id' => 1, 'title' => 'Outing & Gala Dinner Bank BCA', 'category' => 'corporate', 'region' => 'domestik', 'label' => 'Corporate Banking', 'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1000&q=85', 'pax' => '75 Pax', 'duration' => '3 Hari 2 Malam', 'location' => 'Nusa Dua, Bali', 'hotel' => 'The Mulia Resort (*****)', 'arrangements' => 'Exclusive Beachfront Gala Dinner, Outbound Team Building, VIP Escort', 'description' => 'Pendampingan penuh dari tim Travelink Wisata dari penjemputan VIP di Bandara Ngurah Rai, koordinasi venue outbound, hingga acara malam puncak Gala Dinner bertema Royal Nusantara.', 'yt_vid_id' => 'LXb3EKWsInQ'],
                            ['id' => 2, 'title' => 'Private Luxury Family Tour', 'category' => 'private', 'region' => 'domestik', 'label' => 'Private & Family', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1000&q=85', 'pax' => '8 Pax', 'duration' => '4 Hari 3 Malam', 'location' => 'Labuan Bajo, NTT', 'hotel' => 'Private Phinisi & Ayana Resort', 'arrangements' => 'Private Charter Speedboat, Island Hopping, Private Chef', 'description' => 'Perjalanan keluarga privat dengan kapal phinisi mewah untuk mengeksplorasi Pulau Komodo dan Padar bersama tim hospitality pribadi.', 'yt_vid_id' => 'dQw4w9WgXcQ'],
                            ['id' => 3, 'title' => 'Executive Incentive Trip Bank Mandiri', 'category' => 'corporate', 'region' => 'internasional', 'label' => 'Corporate Banking', 'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=85', 'pax' => '40 Pax', 'duration' => '5 Hari 4 Malam', 'location' => 'Singapore & Da Nang', 'hotel' => 'Marina Bay Sands & InterContinental', 'arrangements' => 'Private City Tour, Gala Awarding Dinner, Charter Bus', 'description' => 'Incentive tour lintas negara Asia Tenggara, mencakup reservasi restoran mewah hingga penyerahan penghargaan pimpinan cabang.', 'yt_vid_id' => 'LXb3EKWsInQ'],
                            ['id' => 4, 'title' => 'VIP Retreat Bank BRI', 'category' => 'corporate', 'region' => 'domestik', 'label' => 'Corporate Banking', 'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=1000&q=85', 'pax' => '30 Pax', 'duration' => '3 Hari 2 Malam', 'location' => 'Yogyakarta', 'hotel' => 'Amanjiwo & Hyatt Regency', 'arrangements' => 'Borobudur Sunrise, Heritage Lava Tour, Cultural Dinner', 'description' => 'Retreat privat tingkat pimpinan dengan fokus pada kenyamanan, kuliner tradisional terkurasi, dan pengalaman budaya eksklusif.', 'yt_vid_id' => 'dQw4w9WgXcQ'],
                            ['id' => 5, 'title' => 'Private Custom Honeymoon Tour', 'category' => 'private', 'region' => 'internasional', 'label' => 'Private & Family', 'image' => 'https://images.unsplash.com/photo-1565967511849-76a60a516170?auto=format&fit=crop&w=1000&q=85', 'pax' => '2 Pax', 'duration' => '5 Hari 4 Malam', 'location' => 'Phuket & Bangkok', 'hotel' => 'Keemala Resort & Banyan Tree', 'arrangements' => 'Sunset Dinner Cruise, Couple Spa, Photographer', 'description' => 'Perjalanan bulan madu tailor-made dengan fotografer pribadi dan makan malam romantis di atas yacht.', 'yt_vid_id' => 'LXb3EKWsInQ'],
                            ['id' => 6, 'title' => 'Annual Outing Bank BNI', 'category' => 'corporate', 'region' => 'domestik', 'label' => 'Corporate Banking', 'image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=1000&q=85', 'pax' => '60 Pax', 'duration' => '3 Hari 2 Malam', 'location' => 'Malang & Bromo', 'hotel' => 'Grand Mercure & Plataran Bromo', 'arrangements' => 'Private Jeep Bromo, Sunset Barbecue, Gala Night', 'description' => 'Perjalanan wisata alam dan keakraban staf dengan armada Jeep Bromo yang terkoordinasi rapi.', 'yt_vid_id' => 'dQw4w9WgXcQ'],
                        ];
                    @endphp
                    @foreach($fallbackPortfolio as $item)
                        @php
                            $filterTags = $item['region'] . ' ' . $item['category'];
                            $itemJson = json_encode($item);
                        @endphp
                        <article class="catalog-card" data-filter-tags="{{ $filterTags }}">
                            <div class="card-image">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                <span>{{ $item['label'] }}</span>
                                <div class="play" onclick='openPortfolioModal({{ $itemJson }})'>▶</div>
                            </div>
                            <div class="card-copy">
                                <small>◆ {{ $item['location'] }}</small>
                                <h3>{{ $item['title'] }}</h3>
                                <p class="meta">● {{ $item['pax'] }} &nbsp;&nbsp; ◷ {{ $item['duration'] }}</p>
                            </div>
                            <button class="card-btn" onclick='openPortfolioModal({{ $itemJson }})'>
                                Lihat Detail Video &nbsp;→
                            </button>
                        </article>
                    @endforeach
                @endforelse
            </div>
        </main>
    </div>
@endsection

@section('modals')
    <div id="portfolio-modal-backdrop" class="modal-backdrop" style="display: none;" onclick="closePortfolioModal(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <button class="modal-x" onclick="closePortfolioModal()">×</button>
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
                        <span><small>Special Arrangement</small><span id="modal-portfolio-arrangements">Exclusive Beachfront Gala Dinner, Outbound Team Building, VIP Escort</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentYtId = '';
    let currentImgUrl = '';
    let currentTitle = '';

    // Filter functionality
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

    // Modal functionality
    function openPortfolioModal(item) {
        currentYtId = item.yt_vid_id || 'LXb3EKWsInQ';
        currentImgUrl = item.image || item.thumbnail_url || '';
        currentTitle = item.title || '';

        document.getElementById('modal-portfolio-img').src = currentImgUrl;
        document.getElementById('modal-portfolio-img').alt = currentTitle;
        document.getElementById('modal-portfolio-label').innerText = item.label || 'Corporate Banking';
        document.getElementById('modal-portfolio-title').innerText = currentTitle;
        document.getElementById('modal-portfolio-location').innerText = '◆ ' + (item.location || '');
        document.getElementById('modal-portfolio-desc').innerText = item.description || item.summary || '';
        document.getElementById('modal-portfolio-duration').innerText = item.duration || '-';
        document.getElementById('modal-portfolio-hotel').innerText = item.hotel || 'The Mulia Resort (*****) / Private Phinisi';
        document.getElementById('modal-portfolio-arrangements').innerText = item.arrangements || 'Exclusive Beachfront Gala Dinner, Outbound Team Building, VIP Escort';

        // Reset image and play button
        const container = document.getElementById('modal-image-container');
        container.innerHTML = `
            <img id="modal-portfolio-img" src="${currentImgUrl}" alt="${currentTitle}">
            <span id="modal-play-btn" onclick="playPortfolioVideo()">▶</span>
        `;

        document.getElementById('portfolio-modal-backdrop').style.display = 'grid';
        document.body.style.overflow = 'hidden';
    }

    function playPortfolioVideo() {
        if (!currentYtId) return;
        const container = document.getElementById('modal-image-container');
        container.innerHTML = `
            <iframe src="https://www.youtube-nocookie.com/embed/${currentYtId}?autoplay=1"
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

