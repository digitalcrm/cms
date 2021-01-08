<?php

namespace Database\Seeders;

use App\ThemeTestimonial;
use Illuminate\Database\Seeder;

class ThemeTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonial = [
            [
                'id' => 1,
                'name' => 'PELICAN STEVE',
                'quote' => 'Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
            [
                'id' => 2,
                'name' => 'MAX CONVERSION',
                'quote' => 'Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
            [
                'id' => 3,
                'name' => 'Nick',
                'quote' => 'Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
        ];
        
        ThemeTestimonial::insert($testimonial);
    }
}
