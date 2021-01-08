<?php

namespace Database\Seeders;

use App\ThemeSlider;
use Illuminate\Database\Seeder;

class ThemeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowData = [
            [
                'id' => 1,
                'heading' => 'slider1',
                'paragraph' => 'slider1',
                'button_text1' => 'Buy Now',
                'url1' => '#slider1',
                'button_text2' => 'Demo',
                'url2' => '#slider1',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'heading' => 'slider2',
                'paragraph' => 'slider2',
                'button_text1' => 'Buy Now',
                'url1' => '#slider2',
                'button_text2' => 'Demo',
                'url2' => '#slider2',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'heading' => 'slider3',
                'paragraph' => 'slider3',
                'button_text1' => 'Buy Now',
                'url1' => '#slider3',
                'button_text2' => 'Demo',
                'url2' => '#slider3',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'heading' => 'slider4',
                'paragraph' => 'slider4',
                'button_text1' => 'Buy Now',
                'url1' => '#slider4',
                'button_text2' => 'Demo',
                'url2' => '#slider4',
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'heading' => 'slider5',
                'paragraph' => 'slider5',
                'button_text1' => 'Buy Now',
                'url1' => '#slider5',
                'button_text2' => 'Demo',
                'url2' => '#slider5',
                'created_at' => now(),
            ],
        ];
        ThemeSlider::insert($rowData);
    }
}
