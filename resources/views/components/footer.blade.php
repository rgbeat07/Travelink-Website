<footer id="contact" class="home-footer">
    <div class="footer-grid">
        <div class="footer-about">
            <h3>Travelink Wisata</h3>
            <p>{{ $contact->about_us_text}}</p>
            <div class="social">
                @if(!empty($contact->ig_url))
                    <a href="{{ $contact->ig_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram Travelink Wisata">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5"></rect>
                            <circle cx="12" cy="12" r="4"></circle>
                            <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"></circle>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div>
            <h4>Informasi</h4>
            <p><a href="{{ route('home') }}#about">Tentang Kami</a></p>
            <p><a href="{{ route('portfolio') }}">Portofolio</a></p>
            <p><a href="{{ route('katalog-suvenir') }}">Katalog Suvenir</a></p>
            <p><br /></p>
        </div>
        <div>
            <h4>Hubungi Kami</h4>
            <p>◆ {!! nl2br(e($contact->address)) !!}</p>
            <p>◉ +{{ ltrim($contact->phone_num) }}</p>
            <p>✉ {{ $contact->email}}</p>
        </div>
    </div>
</footer>