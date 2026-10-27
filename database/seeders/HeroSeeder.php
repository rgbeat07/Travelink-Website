<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'photo_url' => 'https://unsplash.com/photos/YI_9SivVt_s/download?w=1920',
            'title' => 'Rancang Perjalanan Eksklusif:  Dari Event Korporat Hingga Private Tour',
            'subtitle' => 'Spesialis penyedia jasa travel tailor-made sesuai kehendak Anda. Menghadirkan standar hospitality nomor satu, pelayanan ramah penuh perhatian, dan keandalan terbaik untuk korporat perbankan maupun perjalanan perorangan & keluarga.',
        ]);
    }
}
