<?php

namespace Database\Seeders;

use App\ThemeHeading;
use Illuminate\Database\Seeder;

class ThemeHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme_heading = [
            [
                'id' => 1,
                'type' => 'client',
                'main_title' => 'Our Clients',
                'sub_title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ],
            [
                'id' => 2,
                'type' => 'team',
                'main_title' => 'Our Creative Team',
                'sub_title' => 'Aliquam sodales justo sit amet urna auctor scelerisquinterdum leo anet tempus enim esent egetis hendrerit vel nibh vitae ornar sem velit aliquam facilisivitae finibus risus feslin is hendrerit vel nibh vitae ornar uspendisse consequat quis sem.',
            ],
            [
                'id' => 3,
                'type' => 'testimonial',
                'main_title' => 'Testimonials',
                'sub_title' => 'Aliquam sodales justo sit amet urna auctor scelerisquinterdum leo anet tempus enim esent egetis hendrerit vel nibh vitae ornar sem velit aliquam facilisivitae.',
            ],
        ];

        ThemeHeading::insert($theme_heading);
    }
}
