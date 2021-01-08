<?php

namespace Database\Seeders;

use App\SettingContact;
use Illuminate\Database\Seeder;

class SettingContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact_us = [
            [
                'title' => 'Contact',
                'paragraph' => 'Feel free to contact us. A business has to be involving, it has to be fun, and it has to exercise your creative instincts. Start where you are. Use what you have. Do what you can.',
                'address' => 'eJobsiteSoftware.com <br>
                            AD 48B, Shalimar Bagh, Delhi – 110088, India <br>
                            Ph: +91 9810336906 (Mobile) <br>
                            info@ejobsitesoftware.com <br>
                            ', 
            ],
        ];

        SettingContact::insert($contact_us);
    }
}
