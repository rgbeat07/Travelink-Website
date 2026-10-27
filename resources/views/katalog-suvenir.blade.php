@extends('layouts.app')

@section('title', 'Katalog Suvenir & Merchandise - Travelink Wisata')
@section('body-class', 'catalog-app')

@section('content')
    <div class="catalog-app">
        <x-header :isCatalog="true" current="gifting" />

        <main class="catalog-main">
            <div class="catalog-intro">
                <span class="eyebrow dark">E-Commerce Lite Catalog</span>
                <h1>Katalog Suvenir &amp; Merchandise</h1>
                <p>Lengkapi momen perjalanan &amp; acara kantor dengan suvenir eksklusif kustom logo. Tatanan elegan siap dikirim sesuai kuantitas pemesanan Anda.</p>
            </div>

            <div class="filters">
                <button class="filter-btn active" data-filter="all">Semua Produk</button>
                <button class="filter-btn" data-filter="executive">Executive Kit</button>
                <button class="filter-btn" data-filter="apparel">Apparel &amp; Merch</button>
                <button class="filter-btn" data-filter="travel">Travel Accessories</button>
                @foreach($categories as $cat)
                    @php $catSlug = Str::slug($cat->category_name); @endphp
                    @if(!in-array($catSlug, ['executive', 'apparel', 'travel']))
                        <button class="filter-btn" data-filter="{{ $catSlug }}">{{ $cat->category_name }}</button>
                    @endif
                @endforeach
            </div>

            <div class="catalog-grid" id="souvenir-grid">
                @forelse($souvenirs as $index => $item)
                    @php
                        $catName = $item->category->category_name ?? 'Executive Kit';
                        $catLower = strtolower($catName);
                        // Map database categories (e.g. Tumbler -> travel, Plakat -> executive) so both standard and custom filters work
                        $extraTag = '';
                        if (str_contains($catLower, 'tumbler')) {
                            $extraTag = 'travel';
                        } elseif (str_contains($catLower, 'plakat')) {
                            $extraTag = 'executive';
                        }
                        $filterTags = Str::slug($catName) . ' ' . $extraTag;

                        // Parse specifications (either bullet string or array)
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
                            'moq' => (int) ($item->moq ?? 10),
                            'description' => $item->description,
                            'image' => $item->main_photo_url,
                            'specs' => $specsList
                        ]);
                    @endphp
                    <article class="catalog-card" data-filter-tags="{{ $filterTags }}">
                        <div class="card-image">
                            <img src="{{ $item->main_photo_url }}" alt="{{ $item->title }}">
                            <span>MOQ: {{ $item->moq ?? 10 }} Pcs</span>
                        </div>
                        <div class="card-copy">
                            <small class="muted">{{ $catName }}</small>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>
                        <button class="card-btn solid" onclick='openSouvenirModal({{ $itemJson }})'>
                            ▣ &nbsp; Lihat Detail &amp; Pesan
                        </button>
                    </article>
                @empty
                    @php
                        $fallbackGifts = [
                            ['id' => 1, 'title' => 'Map Dokumen Kulit Premium', 'category' => 'executive', 'label' => 'Executive Kit', 'moq' => 10, 'image' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=1000&q=85', 'description' => 'Map dokumen eksklusif berbahan kulit sintetis Italia kualitas tinggi dengan jahitan presisi, slot pen, dan penyimpan kartu.', 'specs' => ['Premium Synthetic Italian Leather', 'Emboss foil gold / silver logo', 'Ukuran A4 / F4', 'Hardbox elegan + kartu ucapan']],
                            ['id' => 2, 'title' => 'Executive Tumbler Stainless Gold', 'category' => 'travel', 'label' => 'Travel Accessories', 'moq' => 24, 'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=1000&q=85', 'description' => 'Tumbler termo tahan panas dan dingin hingga 12 jam dengan lapisan matte premium.', 'specs' => ['Stainless Steel 316 Food Grade', 'Kapasitas 500 ml', 'Laser engraving logo', 'Smart LED temperature display']],
                            ['id' => 3, 'title' => 'Jaket Windbreaker Custom Logo', 'category' => 'apparel', 'label' => 'Apparel & Merch', 'moq' => 20, 'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=1000&q=85', 'description' => 'Jaket pelindung angin dan hujan ringan bertema sporty-chic untuk kegiatan outdoor.', 'specs' => ['Waterproof Taslan + furing mesh', 'Bordir komputer high density', 'Ukuran S–XXL', 'Navy dengan aksen gold']],
                            ['id' => 4, 'title' => 'Leather Passport Holder & Tag', 'category' => 'executive', 'label' => 'Executive Kit', 'moq' => 15, 'image' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=1000&q=85', 'description' => 'Set sampul paspor dan gantungan koper kulit sintetis matching warna Navy-Gold.', 'specs' => ['Leatherette premium', 'Passport cover + luggage tag', 'Gold debossing logo', 'Magnet closure']],
                            ['id' => 5, 'title' => 'Premium Travel Duffel Bag', 'category' => 'travel', 'label' => 'Travel Accessories', 'moq' => 15, 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=1000&q=85', 'description' => 'Tas duffel kabin bergaya klasik dengan kompartemen luas dan slot khusus sepatu.', 'specs' => ['Heavy canvas + leather accent', 'Kapasitas 35 liter', 'Metal emblem / emboss tag', 'Waterproof lining']],
                            ['id' => 6, 'title' => 'Metal Ballpoint Pen Gold Emboss', 'category' => 'executive', 'label' => 'Executive Kit', 'moq' => 50, 'image' => 'https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?auto=format&fit=crop&w=1000&q=85', 'description' => 'Pulpen metal berbobot mantap dengan mekanisme putar dan tinta gel hitam mulus.', 'specs' => ['Full metal stainless body', 'Midnight navy / champagne gold', 'Laser engraved logo', 'Velvet pouch / hard box']],
                        ];
                    @endphp
                    @foreach($fallbackGifts as $item)
                        @php
                            $filterTags = $item['category'];
                            $itemJson = json_encode($item);
                        @endphp
                        <article class="catalog-card" data-filter-tags="{{ $filterTags }}">
                            <div class="card-image">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                <span>MOQ: {{ $item['moq'] }} Pcs</span>
                            </div>
                            <div class="card-copy">
                                <small class="muted">{{ $item['label'] }}</small>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['description'] }}</p>
                            </div>
                            <button class="card-btn solid" onclick='openSouvenirModal({{ $itemJson }})'>
                                ▣ &nbsp; Lihat Detail &amp; Pesan
                            </button>
                        </article>
                    @endforeach
                @endforelse
            </div>
        </main>
    </div>
@endsection

@section('modals')
    <div id="souvenir-modal-backdrop" class="modal-backdrop" style="display: none;" onclick="closeSouvenirModal(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <button class="modal-x" onclick="closeSouvenirModal()">×</button>
            <div class="product-modal-grid">
                <div class="modal-image">
                    <img id="modal-souvenir-img" src="" alt="">
                </div>
                <div class="modal-content">
                    <small id="modal-souvenir-label">Executive Kit</small>
                    <h2 id="modal-souvenir-title">Judul Produk</h2>
                    <p id="modal-souvenir-desc">Deskripsi produk...</p>
                    <div class="spec-list">
                        <b>Spesifikasi Material:</b>
                        <div id="modal-souvenir-specs"></div>
                    </div>
                    <label class="qty">
                        Estimasi Jumlah Pesanan (Pcs):
                        <span>
                            <button type="button" onclick="changeSouvenirQty(-1)">−</button>
                            <b id="modal-souvenir-qty">10</b>
                            <button type="button" onclick="changeSouvenirQty(1)">+</button>
                        </span>
                    </label>
                    <a class="order-btn" id="modal-souvenir-wa-btn" target="_blank" href="#">
                        ◉ &nbsp; Pesan via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const waPhone = '{{ ltrim($contact->phone_num ?? '6281234567890', '+') }}';
    let currentSouvenirItem = null;
    let currentQty = 1;

    // Filter functionality
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

    // Modal functionality
    function openSouvenirModal(item) {
        currentSouvenirItem = item;
        currentQty = item.moq || 1;

        document.getElementById('modal-souvenir-img').src = item.image || item.main_photo_url || '';
        document.getElementById('modal-souvenir-img').alt = item.title || '';
        document.getElementById('modal-souvenir-label').innerText = item.label || 'Executive Kit';
        document.getElementById('modal-souvenir-title').innerText = item.title || '';
        document.getElementById('modal-souvenir-desc').innerText = item.description || '';

        // Render specs
        const specsContainer = document.getElementById('modal-souvenir-specs');
        specsContainer.innerHTML = '';
        if (item.specs && Array.isArray(item.specs)) {
            item.specs.forEach(spec => {
                const p = document.createElement('p');
                p.innerText = '✓   ' + spec;
                specsContainer.appendChild(p);
            });
        }

        updateSouvenirQtyDisplay();

        document.getElementById('souvenir-modal-backdrop').style.display = 'grid';
        document.body.style.overflow = 'hidden';
    }

    function changeSouvenirQty(delta) {
        if (!currentSouvenirItem) return;
        const moq = currentSouvenirItem.moq || 1;
        currentQty = Math.max(moq, currentQty + delta);
        updateSouvenirQtyDisplay();
    }

    function updateSouvenirQtyDisplay() {
        document.getElementById('modal-souvenir-qty').innerText = currentQty;
        if (currentSouvenirItem) {
            const message = `Halo Travelink Wisata, saya ingin memesan ${currentSouvenirItem.title} sebanyak ${currentQty} pcs.`;
            const waUrl = `https://wa.me/${waPhone}?text=${encodeURIComponent(message)}`;
            document.getElementById('modal-souvenir-wa-btn').href = waUrl;
        }
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
