<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FirstLetterAttribute;

class FirstLetterAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstLetterAttributes = [
            [
                'letter' => 'A',
                'description' => '<p><strong>Letter A Attributes:</strong></p><ul><li>Leadership qualities</li><li>Ambitious and determined</li><li>Natural born leader</li><li>Independent thinker</li><li>Creative and innovative</li><li>Strong willpower</li><li>Pioneering spirit</li></ul>'
            ],
            [
                'letter' => 'B',
                'description' => '<p><strong>Letter B Attributes:</strong></p><ul><li>Balanced and harmonious</li><li>Diplomatic nature</li><li>Peace-loving personality</li><li>Good communication skills</li><li>Team player</li><li>Patient and understanding</li><li>Reliable and trustworthy</li></ul>'
            ],
            [
                'letter' => 'C',
                'description' => '<p><strong>Letter C Attributes:</strong></p><ul><li>Creative and artistic</li><li>Expressive communication</li><li>Optimistic outlook</li><li>Social and friendly</li><li>Adaptable to change</li><li>Enthusiastic nature</li><li>Good sense of humor</li></ul>'
            ],
            [
                'letter' => 'D',
                'description' => '<p><strong>Letter D Attributes:</strong></p><ul><li>Determined and focused</li><li>Practical approach</li><li>Hardworking nature</li><li>Reliable and responsible</li><li>Strong organizational skills</li><li>Detail-oriented</li><li>Persistent in goals</li></ul>'
            ],
            [
                'letter' => 'E',
                'description' => '<p><strong>Letter E Attributes:</strong></p><ul><li>Enthusiastic and energetic</li><li>Freedom-loving spirit</li><li>Adventurous nature</li><li>Versatile personality</li><li>Quick thinking</li><li>Adaptable to situations</li><li>Natural curiosity</li></ul>'
            ],
            [
                'letter' => 'F',
                'description' => '<p><strong>Letter F Attributes:</strong></p><ul><li>Family-oriented</li><li>Faithful and loyal</li><li>Nurturing personality</li><li>Compassionate nature</li><li>Responsible attitude</li><li>Good caregiver</li><li>Emotionally stable</li></ul>'
            ],
            [
                'letter' => 'G',
                'description' => '<p><strong>Letter G Attributes:</strong></p><ul><li>Goal-oriented mindset</li><li>Genuine and honest</li><li>Generous nature</li><li>Spiritual inclination</li><li>Intuitive abilities</li><li>Mysterious personality</li><li>Deep thinker</li></ul>'
            ],
            [
                'letter' => 'H',
                'description' => '<p><strong>Letter H Attributes:</strong></p><ul><li>Hardworking and practical</li><li>Honest and straightforward</li><li>Home-loving nature</li><li>Helpful personality</li><li>Humble attitude</li><li>Health-conscious</li><li>Harmonious relationships</li></ul>'
            ],
            [
                'letter' => 'I',
                'description' => '<p><strong>Letter I Attributes:</strong></p><ul><li>Intelligent and analytical</li><li>Independent nature</li><li>Innovative thinking</li><li>Intuitive abilities</li><li>Inspiring personality</li><li>Imaginative mind</li><li>Influential character</li></ul>'
            ],
            [
                'letter' => 'J',
                'description' => '<p><strong>Letter J Attributes:</strong></p><ul><li>Just and fair-minded</li><li>Joyful personality</li><li>Judicious decision maker</li><li>Jovial nature</li><li>Justice-oriented</li><li>Jovial and friendly</li><li>Judicious in choices</li></ul>'
            ]
        ];

        foreach ($firstLetterAttributes as $attribute) {
            FirstLetterAttribute::create($attribute);
        }
    }
}
