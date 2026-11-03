<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['name' => 'Umi Kalsum', 'job' => 'Chief Executive Officer (CEO)'],
            ['name' => 'Syfak Gartina', 'job' => 'Chief People Officer (CPO)'],
            ['name' => 'Aga Firmansyah', 'job' => 'Chief Financial Officer (CFO)'],
            ['name' => 'Muhammad Rafi Athaillah Rayhansyah', 'job' => 'Chief Technology Officer (CTO)'],
            ['name' => 'Alvinda Pratama', 'job' => 'Chief Operating Officer (COO)'],
            ['name' => 'Laudya Aquilla Putry Ayu', 'job' => 'Chief Marketing Officer (CMO)']
        ];

        foreach ($members as $index => $member) {
            Team::create([
                'name' => $member['name'],
                'job' => $member['job'],
                'photo_url' => 'https://picsum.photos/400/500?random='.($index + 1),
            ]);
        }
    }
}
