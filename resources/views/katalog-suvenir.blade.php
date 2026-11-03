@extends('layouts.app')

@section('title', 'Katalog Suvenir & Merchandise - Travelink Wisata')
@section('body-class', 'catalog-app')

@section('content')
    <div class="catalog-app">

        <main class="catalog-main">
            <div class="catalog-intro">
                <span class="eyebrow dark">E-Commerce Lite Catalog</span>
                <h1>Katalog Suvenir & Merchandise</h1>
                <p>Lengkapi momen perjalanan & acara kantor dengan suvenir eksklusif kustom logo. Tatanan elegan siap dikirim sesuai kuantitas pemesanan Anda.</p>
            </div>

            <div class="filters">
                <button class="filter-btn active" data-filter="all">Semua Produk</button>
                <button class="filter-btn" data-filter="gift">Gift</button>
                <button class="filter-btn" data-filter="tas">Tas</button>
            </div>

            <div class="catalog-grid" id="souvenir-grid">
                @foreach($souvenirs as $index => $item)
                    @php
                        $catName = $item->category;
                        $filterTags = Str::slug($catName);

                        $specsList = [];
                        if (!empty($item->specification)) {
                            $lines = explode("\n", str_replace(["\r", "•", "-"], "", $item->specification));
                            foreach ($lines as $line) {
                                $trimmed = trim($line);
                                if ($trimmed !== '') {
                                    $specsList[] = $trimmed;
                                }
                            }
                        }
                        if (empty($specsList)) {
                            $specsList = ['Premium Material High Grade', 'Laser Engraving / Foil Emboss Logo', 'Packaging Hardbox Eksklusif'];
                        }

                        $itemJson = json_encode([
                            'id' => $item->id,
                            'title' => $item->title,
                            'label' => $catName,
                            'moq' => (int) ($item->moq),
                            'description' => $item->description,
                            'image' => $item->main_photo_url,
                            'specs' => $specsList
                        ]);
                    @endphp
                    <article class="catalog-card" data-filter-tags="{{ $filterTags }}">
                        <div class="card-image">
                            <img src="{{ $item->main_photo_url }}" alt="{{ $item->title }}">
                            <span>MOQ: {{ $item->moq}} Pcs</span>
                        </div>
                        <div class="card-copy">
                            <small class="muted">{{ $catName }}</small>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>
                        <button class="card-btn solid" onclick='openSouvenirModal({{ $itemJson }})'>
                            Lihat Detail
                        </button>
                    </article>
                @endforeach
            </div>
        </main>
    </div>
@endsection

@section('modals')
    <div id="souvenir-modal-backdrop" class="modal-backdrop" style="display: none;" onclick="closeSouvenirModal(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <button class="modal-x" onclick="closeSouvenirModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="product-modal-grid">
                <div class="modal-image">
                    <img id="modal-souvenir-img" src="" alt="">
                </div>
                <div class="modal-content">
                    <small id="modal-souvenir-label">Kategori produk</small>
                    <h2 id="modal-souvenir-title">Judul Produk</h2>
                    <p id="modal-souvenir-desc">Deskripsi produk...</p>
                    <div class="spec-list">
                        <b>Spesifikasi:</b>
                        <div id="modal-souvenir-specs">spesifikasi produk</div>
                    </div>
                    
                    <div class="moq-info">
                        Minimal Pemesanan (MOQ): <span id="modal-souvenir-moq" style="color: var(--catgold);">10 Pcs</span>
                    </div>

                    <a class="order-btn" id="modal-souvenir-wa-btn" target="_blank" href="#">
                        Tanya Detail via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const waPhone = '{{ ltrim($contact->phone_num) }}';
    let currentSouvenirItem = null;

    document.querySelectorAll('.filters .filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filters .filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            const cards = document.querySelectorAll('#souvenir-grid .catalog-card');

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

    function openSouvenirModal(item) {
        currentSouvenirItem = item;

        document.getElementById('modal-souvenir-img').src = item.image || item.main_photo_url;
        document.getElementById('modal-souvenir-img').alt = item.title;
        document.getElementById('modal-souvenir-label').innerText = item.label;
        document.getElementById('modal-souvenir-title').innerText = item.title;
        document.getElementById('modal-souvenir-desc').innerText = item.description;
        
        const moqValue = item.moq || 10;
        document.getElementById('modal-souvenir-moq').innerText = moqValue + ' Pcs';

        const specsContainer = document.getElementById('modal-souvenir-specs');
        specsContainer.innerHTML = '';
        if (item.specs && Array.isArray(item.specs)) {
            item.specs.forEach(spec => {
                const p = document.createElement('p');
                p.innerText = '✓ ' + spec;
                specsContainer.appendChild(p);
            });
        }

        const message = `Halo Travelink Wisata, saya ingin menanyakan detail lebih lanjut mengenai produk ${item.title}.`;
        const waUrl = `https://wa.me/${waPhone}?text=${encodeURIComponent(message)}`;
        document.getElementById('modal-souvenir-wa-btn').href = waUrl;

        document.getElementById('souvenir-modal-backdrop').style.display = 'grid';
        document.body.style.overflow = 'hidden';
    }

    function closeSouvenirModal(e) {
        if (e && e.target !== e.currentTarget && !e.target.classList.contains('modal-x')) return;
        document.getElementById('souvenir-modal-backdrop').style.display = 'none';
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSouvenirModal();
        }
    });
</script>
@endpush