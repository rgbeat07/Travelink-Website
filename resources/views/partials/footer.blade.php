<footer id="contact" class="home-footer">
    <div class="footer-grid">
        <div class="footer-about">
            <h3>Travelink Wisata</h3>
            <p>{{ $contact->about_us_text ?? 'Penyedia jasa travel tailor-made domestik & regional Asia Tenggara (Singapura, Malaysia, Thailand, Vietnam). Spesialis korporat perbankan dan perjalanan privat.' }}</p>
            <div class="social">
                @if(!empty($contact->ig_url))
                    <a href="{{ $contact->ig_url }}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none;">◎</a> &nbsp; in
                @else
                    ◎ &nbsp; in
                @endif
            </div>
        </div>
        <div>
            <h4>Informasi</h4>
            <p><a href="{{ route('home') }}#about">Tentang Kami</a></p>
            <p><a href="{{ route('portofolio') }}">Portofolio</a></p>
            <p><a href="{{ route('katalog-suvenir') }}">Katalog Suvenir</a></p>
            <p><br /></p>
        </div>
        <div>
            <h4>Hubungi Kami</h4>
            <p>◆ {!! nl2br(e($contact->address ?? "Menara Bisnis Sudirman Lt. 8\nJl. Jend. Sudirman, Jakarta 12190")) !!}</p>
            <p>◉ +{{ ltrim($contact->phone_num ?? '6281234567890', '+') }}</p>
            <p>✉ {{ $contact->email ?? 'hello@travelinkwisata.com' }}</p>
        </div>
    </div>
</footer>

