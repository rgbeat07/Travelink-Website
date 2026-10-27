<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ["name" => "Umi Kalsum", "job" => "CEO of Travelink Wisata"],
            ["name" => "Syfak Gartina", "job" => "CEO of Travelink Wisata"],
            ["name" => "Aga Firmansyah", "job" => "CEO of Travelink Wisata"],
            ["name" => "Muhammad Rafi Athaillah Rayhansyah", "job" => "CEO of Travelink Wisata"],
        ];
        
        foreach($members as $index => $member){
            Team::create([
                "name" => $member["name"],
                "job" => $member["job"],
                "photo_url" => "https://picsum.photos/400/500?random=" . ($index + 1)
            ]);
        }
    }
}
