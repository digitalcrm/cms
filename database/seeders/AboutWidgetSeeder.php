<?php

namespace Database\Seeders;

use App\AboutWidget;
use Illuminate\Database\Seeder;

class AboutWidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about_widget = [
            [
                'id' => 1,
                'heading' => 'About Us',
                'sub_heading' => 'up Feel free to contact us. A business has to be involving, it has to be fun, and it has to exercise your creative instincts. Start where you are. Use what you have. Do what you can.',
            ],
        ];

        AboutWidget::insert($about_widget);
    }
}
