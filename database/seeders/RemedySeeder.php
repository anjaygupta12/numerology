<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Remedy;

class RemedySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $remedies = [
            [
                'number' => 1,
                'bn' => "• Wear Ruby gemstone\n• Chant Surya Mantra daily\n• Donate wheat to needy\n• Fast on Sundays\n• Wear red colored clothes",
                'dn' => "• Practice meditation daily\n• Visit temples regularly\n• Donate sweets to children\n• Wear red or orange colors\n• Chant Gayatri Mantra",
                'nn' => "• Wear Ruby or Red Coral\n• Practice leadership skills\n• Donate red items\n• Fast on Sundays\n• Wear red colored clothes",
                'status' => true
            ],
            [
                'number' => 2,
                'bn' => "• Wear Pearl gemstone\n• Chant Chandra Mantra\n• Donate white items\n• Fast on Mondays\n• Wear white or silver clothes",
                'dn' => "• Practice patience and diplomacy\n• Visit water bodies\n• Donate milk products\n• Wear white or silver colors\n• Chant Om Namah Shivaya",
                'nn' => "• Wear Pearl or Moonstone\n• Practice cooperation skills\n• Donate white items\n• Fast on Mondays\n• Wear white colored clothes",
                'status' => true
            ],
            [
                'number' => 3,
                'bn' => "• Wear Yellow Sapphire\n• Chant Guru Mantra\n• Donate yellow items\n• Fast on Thursdays\n• Wear yellow colored clothes",
                'dn' => "• Practice creativity and expression\n• Visit educational institutions\n• Donate books and stationery\n• Wear yellow or orange colors\n• Chant Guru Mantra",
                'nn' => "• Wear Yellow Sapphire\n• Practice communication skills\n• Donate yellow items\n• Fast on Thursdays\n• Wear yellow colored clothes",
                'status' => true
            ],
            [
                'number' => 4,
                'bn' => "• Wear Blue Sapphire\n• Chant Shani Mantra\n• Donate black items\n• Fast on Saturdays\n• Wear black or blue clothes",
                'dn' => "• Practice discipline and hard work\n• Visit old age homes\n• Donate iron items\n• Wear black or blue colors\n• Chant Shani Mantra",
                'nn' => "• Wear Blue Sapphire\n• Practice organizational skills\n• Donate black items\n• Fast on Saturdays\n• Wear black colored clothes",
                'status' => true
            ],
            [
                'number' => 5,
                'bn' => "• Wear Emerald gemstone\n• Chant Budh Mantra\n• Donate green items\n• Fast on Wednesdays\n• Wear green colored clothes",
                'dn' => "• Practice adaptability and change\n• Visit new places regularly\n• Donate green vegetables\n• Wear green or light blue colors\n• Chant Budh Mantra",
                'nn' => "• Wear Emerald\n• Practice flexibility skills\n• Donate green items\n• Fast on Wednesdays\n• Wear green colored clothes",
                'status' => true
            ],
            [
                'number' => 6,
                'bn' => "• Wear Diamond or White Sapphire\n• Chant Shukra Mantra\n• Donate white items\n• Fast on Fridays\n• Wear white or pink clothes",
                'dn' => "• Practice love and compassion\n• Visit family and friends\n• Donate sweets and flowers\n• Wear white or pink colors\n• Chant Shukra Mantra",
                'nn' => "• Wear Diamond or White Sapphire\n• Practice nurturing skills\n• Donate white items\n• Fast on Fridays\n• Wear white colored clothes",
                'status' => true
            ],
            [
                'number' => 7,
                'bn' => "• Wear Blue Sapphire\n• Chant Ketu Mantra\n• Donate blue items\n• Fast on Tuesdays\n• Wear blue or purple clothes",
                'dn' => "• Practice spirituality and meditation\n• Visit spiritual places\n• Donate spiritual books\n• Wear blue or purple colors\n• Chant Ketu Mantra",
                'nn' => "• Wear Blue Sapphire\n• Practice analytical skills\n• Donate blue items\n• Fast on Tuesdays\n• Wear blue colored clothes",
                'status' => true
            ],
            [
                'number' => 8,
                'bn' => "• Wear Hessonite Garnet\n• Chant Rahu Mantra\n• Donate dark items\n• Fast on Saturdays\n• Wear dark colored clothes",
                'dn' => "• Practice ambition and authority\n• Visit business centers\n• Donate money to charity\n• Wear dark or navy colors\n• Chant Rahu Mantra",
                'nn' => "• Wear Hessonite Garnet\n• Practice leadership skills\n• Donate dark items\n• Fast on Saturdays\n• Wear dark colored clothes",
                'status' => true
            ],
            [
                'number' => 9,
                'bn' => "• Wear Red Coral\n• Chant Mars Mantra\n• Donate red items\n• Fast on Tuesdays\n• Wear red colored clothes",
                'dn' => "• Practice humanitarian service\n• Visit charitable organizations\n• Donate to the needy\n• Wear red or orange colors\n• Chant Mars Mantra",
                'nn' => "• Wear Red Coral\n• Practice service skills\n• Donate red items\n• Fast on Tuesdays\n• Wear red colored clothes",
                'status' => true
            ]
        ];

        foreach ($remedies as $remedy) {
            Remedy::create($remedy);
        }
    }
}
