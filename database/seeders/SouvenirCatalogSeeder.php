<?php

namespace Database\Seeders;

use App\Models\SouvenirCatalog;
use Illuminate\Database\Seeder;

class SouvenirCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $souvenirs = [
            ['category' => 'Gift', 'title' => 'Gift Box', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1SMvJWGSMjpWSGUEgYjCGoDzO-XvAGD2H', 'moq' => 10, 'description' => 'Souvenir eksklusif yang berisi handbag dan tumbler, dilengkapi dengan opsi desain sablon custom yang dapat diaplikasikan pada bagian box maupun tumbler.', 'specification' => "berisi: handbag dan tumbler\ndesign: sablon custom box dan tumbler"],
            ['category' => 'Gift', 'title' => 'Set Tas dan Tumbler', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1FCiLGwYmF1Atu-qwrdMMAsFR3ffEQXzc', 'moq' => 10, 'description' => 'Paket perlengkapan fungsional yang berisi handbag, tumbler, dan stringbag, dengan tampilan yang dapat disesuaikan melalui desain sablon custom.', 'specification' => "berisi: handbag, tumbler, stringbag\ndesign: sablon custom"],
            ['category' => 'Gift', 'title' => 'Set Loop dan UV', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1dxdaDPMAwsWyZEDkYLzZpeQlNj7Zrpnn', 'moq' => 10, 'description' => 'Set multifungsi dan lengkap yang berisi sinar UV, tali loop, pulpen, dan dompet, serta didukung dengan pilihan desain sablon custom', 'specification' => "berisi: sinar uv, loop, pulpen, Dompet\ndesign: sablon custom"],
            ['category' => 'Tas', 'title' => 'Tas Ransel', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/19ebMv_vIkf6GdMgZXlVzNSQz1JXzNeKJ', 'moq' => 10, 'description' => 'Tas punggung serbaguna yang sangat fleksibel untuk berbagai kebutuhan karena warna dan ukurannya dapat dipesan secara custom', 'specification' => "warna: custom\nukuran: custom"],
            ['category' => 'Gift', 'title' => 'Kipas PVC', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1eUpVQUNwnVrCH9SBAITTlmYvno5Z69kM', 'moq' => 10, 'description' => 'Souvenir kipas berbahan PVC yang ringan dan praktis, menawarkan kebebasan penuh untuk menentukan desain maupun ukurannya (custom).', 'specification' => "design: custom\nukuran: custom"],
            ['category' => 'Gift', 'title' => 'Pouch', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1QkjpOVH5i6y_7xWcG5lZBWS-YcuUWRtw', 'moq' => 10, 'description' => 'Wadah penyimpanan portabel dengan warna custom, yang visualnya dapat dipercantik menggunakan desain custom melalui teknik sablon atau cetak timbul.', 'specification' => "design: custom, sablon/timbul\nwarna: custom"],
            ['category' => 'Tas', 'title' => 'Totebag', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1uHLg6JreZ9m_gD3nF6Wsmc9y3umCgUD9', 'moq' => 10, 'description' => 'Tas jinjing (totebag) dengan ukuran custom yang tampilannya bisa disesuaikan menggunakan desain custom, tersedia dalam pilihan aplikasi sablon atau bordir', 'specification' => "design: custom, sablon/bordir\nukuran: custom"],
            ['category' => 'Gift', 'title' => 'Sinar UV', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1oQ9ZaA_joNheh7KYCEHHeRuHy7s2xyOW', 'moq' => 10, 'description' => 'Perangkat sinar UV dengan pilihan warna custom, yang tampilannya dapat dipersonalisasi lebih lanjut menggunakan desain sablon custom', 'specification' => "design: sablon custom\nwarna: custom"],
            ['category' => 'Gift', 'title' => 'Set payung', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1J1sPvWvzqmLXsdRQHWFYXcH33tG0AyYo', 'moq' => 10, 'description' => 'Paket perlengkapan cuaca yang berisi payung beserta tas penyimpanannya, tersedia dengan pilihan warna custom dan desain sablon custom', 'specification' => "berisi: payung dan tas\ndesign: sablon custom\nwarna: custom"],
            ['category' => 'Gift', 'title' => 'Loop', 'main_photo_url' => 'https://lh3.googleusercontent.com/d/1jOu_I7IVXNmlZR-spHSeaCXGA4frntzk', 'moq' => 10, 'description' => 'Tali loop atau lanyard yang praktis, dengan visual yang dapat dirancang secara khusus menggunakan desain sablon custom untuk kebutuhan acara atau promosi.', 'specification' => 'design: sablon custom'],
        ];

        foreach ($souvenirs as $souvenir) {
            SouvenirCatalog::create($souvenir);
        }
    }
}
