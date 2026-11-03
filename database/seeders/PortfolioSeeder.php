<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            ['category' => 'Domestik', 'title' => 'Gathering Perkasa & PPKS Bank Indonesia Semarang', 'video_url' => 'https://www.instagram.com/reel/CkiiZYBDkS9/', 'thumbnail_url' => '/images/portfolio/gathering-perkasa-ppks-bank-indonesia-semarang.jpg', 'location' => 'Bromo'],
            ['category' => 'Domestik', 'title' => 'Sarasehan dan kordinasi perkasan Bank Indonesia Kediri', 'video_url' => 'https://www.instagram.com/reel/CklOvtiL3Hg/', 'thumbnail_url' => '/images/portfolio/sarasehan-dan-kordinasi-perkasan-bank-indonesia-kediri.jpg', 'location' => 'Jakarta'],
            ['category' => 'Domestik', 'title' => 'PMK dan Sosialisasi Bank Indonesia Kediri', 'video_url' => 'https://www.instagram.com/reel/Cmv5V1PI9fb/', 'thumbnail_url' => '/images/portfolio/pmk-dan-sosialisasi-bank-indonesia-kediri.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Gathering BPJS Ketenagakerjaan Blitar', 'video_url' => 'https://www.instagram.com/reel/Cm86TW1IBhw/', 'thumbnail_url' => '/images/portfolio/gathering-bpjs-ketenagakerjaan-blitar.jpg', 'location' => 'Denpasar'],
            ['category' => 'Domestik', 'title' => 'Gathering HJS Subur Jaya', 'video_url' => 'https://www.instagram.com/reel/CuKVcp2rImD/', 'thumbnail_url' => '/images/portfolio/gathering-hjs-subur-jaya.jpg', 'location' => 'Batu'],
            ['category' => 'Domestik', 'title' => 'Gathering HJS Subur Jaya', 'video_url' => 'https://www.instagram.com/reel/CuKWoBOuJt0/', 'thumbnail_url' => '/images/portfolio/gathering-hjs-subur-jaya-2.jpg', 'location' => 'Denpasar'],
            ['category' => 'Domestik', 'title' => 'Gathering BPJS Ketenagakerjaan Blitar', 'video_url' => 'https://www.instagram.com/reel/CuMSs1jsF4D/', 'thumbnail_url' => '/images/portfolio/gathering-bpjs-ketenagakerjaan-blitar-2.jpg', 'location' => 'Batu'],
            ['category' => 'Domestik', 'title' => 'Gathering BPJS Ketenagakerjaan Karimunjawa', 'video_url' => 'https://www.instagram.com/reel/CuMTZJ-tcwl/', 'thumbnail_url' => '/images/portfolio/gathering-bpjs-ketenagakerjaan-karimunjawa.jpg', 'location' => 'Batu'],
            ['category' => 'Internasional', 'title' => 'Forum Kliring & Capacity Building sewilker KPwBI Jember', 'video_url' => 'https://www.instagram.com/reel/CuMUrluvHWh/', 'thumbnail_url' => '/images/portfolio/forum-kliring-capacity-building-sewilker-kpwbi-jember.jpg', 'location' => 'Singapura'],
            ['category' => 'Domestik', 'title' => 'Edukasi iwaba Jatim', 'video_url' => 'https://www.instagram.com/reel/C1ZobNvvZHh/', 'thumbnail_url' => '/images/portfolio/edukasi-iwaba-jatim.jpg', 'location' => 'Surabaya'],
            ['category' => 'Domestik', 'title' => 'Capacity Building Forum Perkasan Tahun 2023 KPwBI Jember', 'video_url' => 'https://www.instagram.com/reel/C84pYxyvW04/', 'thumbnail_url' => '/images/portfolio/capacity-building-forum-perkasan-tahun-2023-kpwbi-jember.jpg', 'location' => 'Labuhan Bajo'],
            ['category' => 'Domestik', 'title' => 'Capacity Building BI Jember', 'video_url' => 'https://www.instagram.com/reel/C84qBoQP0N9/', 'thumbnail_url' => '/images/portfolio/capacity-building-bi-jember.jpg', 'location' => 'Bandung'],
            ['category' => 'Domestik', 'title' => 'Bionic Tiger 2023 Maybank Jatim', 'video_url' => 'https://www.instagram.com/reel/C84rcfNPWpt/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-2023-maybank-jatim.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Bionic Tiger 2024 Maybank Regional', 'video_url' => 'https://www.instagram.com/reel/C85m-j7SNqD/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-2024-maybank-regional.jpg', 'location' => 'Malang'],
            ['category' => 'Domestik', 'title' => 'Bionic Tiger 2024 Maybank Jatim', 'video_url' => 'https://www.instagram.com/reel/C85n5fRyPhd/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-2024-maybank-jatim.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Capacity Building BI Jember Kas', 'video_url' => 'https://www.instagram.com/reel/C-CGXDJPCFx/', 'thumbnail_url' => '/images/portfolio/capacity-building-bi-jember-kas.jpg', 'location' => 'Bandung'],
            ['category' => 'Domestik', 'title' => 'Capacity Building BI Jember Kliring', 'video_url' => 'https://www.instagram.com/reel/C-CLJz4PRFC/', 'thumbnail_url' => '/images/portfolio/capacity-building-bi-jember-kliring.jpg', 'location' => 'Lombok'],
            ['category' => 'Domestik', 'title' => 'Bionic Tiger 2024 Maybank Collection', 'video_url' => 'https://www.instagram.com/reel/C-CwwOmPu1U/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-2024-maybank-collection.jpg', 'location' => 'Trawas'],
            ['category' => 'Domestik', 'title' => 'Capacity building BPTP Jatim', 'video_url' => 'https://www.instagram.com/reel/DAf8pAFP3Kw/', 'thumbnail_url' => '/images/portfolio/capacity-building-bptp-jatim.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Acara perkasan & capacity building KPwBI kediri', 'video_url' => 'https://www.instagram.com/reel/DCOpGorPcXA/', 'thumbnail_url' => '/images/portfolio/acara-perkasan-capacity-building-kpwbi-kediri.jpg', 'location' => 'Bandung'],
            ['category' => 'Domestik', 'title' => 'Capacity building sobat kliring PPKS squad', 'video_url' => 'https://www.instagram.com/reel/DCOpqBNNc3N/', 'thumbnail_url' => '/images/portfolio/capacity-building-sobat-kliring-ppks-squad.jpg', 'location' => 'Denpasar'],
            ['category' => 'Domestik', 'title' => 'Capacity building TPID Se Wilker BI Kediri', 'video_url' => 'https://www.instagram.com/reel/DCOqNmEv_Oy/', 'thumbnail_url' => '/images/portfolio/capacity-building-tpid-se-wilker-bi-kediri.jpg', 'location' => 'Mataram'],
            ['category' => 'Domestik', 'title' => 'Capacity building perbankan se wilker KPwBI jatim', 'video_url' => 'https://www.instagram.com/reel/DCTGuKnPrDv/', 'thumbnail_url' => '/images/portfolio/capacity-building-perbankan-se-wilker-kpwbi-jatim.jpg', 'location' => 'Bandung'],
            ['category' => 'Domestik', 'title' => 'Bionic tiger maybank jatim 1', 'video_url' => 'https://www.instagram.com/reel/DL9eGFLPHug/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-maybank-jatim-1.jpg', 'location' => 'Malang'],
            ['category' => 'Domestik', 'title' => 'Bionic tiger maybank jatim 4', 'video_url' => 'https://www.instagram.com/reel/DMFYNvNPfoI/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-maybank-jatim-4.jpg', 'location' => 'Semarang'],
            ['category' => 'Domestik', 'title' => 'Bionic tiger maybank jatim 3', 'video_url' => 'https://www.instagram.com/reel/DMFmHGZP3-0/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-maybank-jatim-3.jpg', 'location' => 'Solo'],
            ['category' => 'Domestik', 'title' => 'Kegiatan family gathering petani gula kediri', 'video_url' => 'https://www.instagram.com/reel/DM1lTo9PEmz/', 'thumbnail_url' => '/images/portfolio/kegiatan-family-gathering-petani-gula-kediri.jpg', 'location' => 'Banyuwangi'],
            ['category' => 'Domestik', 'title' => 'Bionic tiger maybank regional', 'video_url' => 'https://www.instagram.com/reel/DNSvcGcPinf/', 'thumbnail_url' => '/images/portfolio/bionic-tiger-maybank-regional.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Gathering IBK cabang Samator', 'video_url' => 'https://www.instagram.com/reel/DQinY5kE5JI/', 'thumbnail_url' => '/images/portfolio/gathering-ibk-cabang-samator.jpg', 'location' => 'Dieng'],
            ['category' => 'Domestik', 'title' => 'Acara PBI (pensiunan bi jatim)', 'video_url' => 'https://www.instagram.com/reel/DQinvSNkzyb/', 'thumbnail_url' => '/images/portfolio/acara-pbi-pensiunan-bi-jatim.jpg', 'location' => 'Yogyakarta'],
            ['category' => 'Domestik', 'title' => 'Capacity Building Bank Indonesia Surabaya & FKS Kliring Surabaya', 'video_url' => 'https://www.instagram.com/reel/DQio8asE30w/', 'thumbnail_url' => '/images/portfolio/capacity-building-bank-indonesia-surabaya-fks-kliring-surabaya.jpg', 'location' => 'Batu'],
            ['category' => 'Domestik', 'title' => 'Fun Offroad Cuban Talun BI & FKS Jatim', 'video_url' => 'https://www.instagram.com/reel/DQipzVKk0Qb/', 'thumbnail_url' => '/images/portfolio/fun-offroad-cuban-talun-bi-fks-jatim.jpg', 'location' => 'Cuban Talun'],
            ['category' => 'Domestik', 'title' => 'Gathering Bank SMBC', 'video_url' => 'https://www.instagram.com/reel/DSlzDhEE0g0/', 'thumbnail_url' => '/images/portfolio/gathering-bank-smbc.jpg', 'location' => 'Batu'],
            ['category' => 'Domestik', 'title' => 'Capacity building perkasan bi jatim', 'video_url' => 'https://www.instagram.com/reel/DSl4I0fEzSf/', 'thumbnail_url' => '/images/portfolio/capacity-building-perkasan-bi-jatim.jpg', 'location' => 'Malang'],
            ['category' => 'Domestik', 'title' => 'Gathering kliring bank indonesia jember', 'video_url' => 'https://www.instagram.com/reel/DSsEOCBk6a4/', 'thumbnail_url' => '/images/portfolio/gathering-kliring-bank-indonesia-jember.jpg', 'location' => 'Banyuwangi'],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
