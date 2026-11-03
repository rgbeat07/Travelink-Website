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
            ['name' => 'Umi Kalsum', 'job' => 'Chief Executive Officer (CEO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/1XyOiPie9wxBpQhENSHWgeaGI7qfiL627'],
            ['name' => 'Syfak Gartina', 'job' => 'Chief People Officer (CPO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/1rIt0QwJoXE6YL-stCGJrBNb_wYwNJvW3'],
            ['name' => 'Aga Firmansyah', 'job' => 'Chief Financial Officer (CFO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/1Ll6T0hWn-25i2T8cComtZHWfD6bcGvAV'],
            ['name' => 'Muhammad Rafi Athaillah Rayhansyah', 'job' => 'Chief Technology Officer (CTO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/1ICqLJmIp3y_axB8D1Jg8xnFUxXH4MbSO'],
            ['name' => 'Alvinda Pratama', 'job' => 'Chief Operating Officer (COO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/10--Z6kKE7RF0SvrawSF8CcF9GcrJc5jb'],
            ['name' => 'Laudya Aquilla Putry Ayu', 'job' => 'Chief Marketing Officer (CMO)', 'photo_url' => 'https://lh3.googleusercontent.com/d/1ubiIbh56z-QsLrNSReIOSXXwa0kw2IxR']
        ];

        foreach ($members as $index => $member) {
            Team::create($member);
        }
    }
}