<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'phone_num' => '6281231585998',
            'email' => 'travelink_tours@yahoo.com',
            'address' => 'Jl. Wiyung Gang Pasar No. 162B',
            'ig_url' => 'https://instagram.com/travelinkwisatasurabaya',
            'about_us_text' => 'Travelink Wisata lahir sebagai penyedia jasa perjalanan yang mengedepankan fleksibilitas tinggi dan kepuasan personal. Meskipun kami menjadi pilihan utama berbagai institusi perbankan nasional untuk agenda korporat, kami juga melayani perjalanan privat perorangan dan keluarga dengan standar perhatian yang sama tingginya.',
        ]);
    }
}
