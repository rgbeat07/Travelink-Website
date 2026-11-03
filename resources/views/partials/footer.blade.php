<footer id="contact" class="home-footer">
    <div class="footer-grid">
        <div class="footer-about">
            <h3>Travelink Wisata</h3>
            <p>{{ $contact->about_us_text}}</p>
            <div class="social">
                @if(!empty($contact->ig_url))
                    <a href="{{ $contact->ig_url }}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none;">◎</a>
                @else
                    in
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