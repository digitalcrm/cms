<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * There is some default seeding behaviour we need for our projects
     * @return void
     */
    public function run()
    {
        $this->call([

            /** Basic User Setup */
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,

            /**Theme setup */
            ThemeSeeder::class,
            
            /** Comapny Theme customization part */
            ThemeSliderSeeder::class,
            ThemeServiceSeeder::class, // In future there would be some changes needed 
            ThemeIntroSeeder::class,
            ThemeBioSeeder::class,
            ThemeHeadingSeeder::class,
            ThemeTeamSeeder::class,
            ThemeTestimonialSeeder::class,
            ThemeStatisticSeeder::class,
            SettingContactSeeder::class,
            AboutWidgetSeeder::class,
            LandingpageStyleSeeder::class,
            
            /** Category or Subcategory */
            CategorySeeder::class,
            SubcategorySeeder::class,
            
            
            /** Seeting Mandatory part */
            BookingServiceSeeder::class,
            BookingActivitySeeder::class,
            SettingCmsVisibilitySeeder::class,
            LogoSeeder::class,
            ArticleLimitSeeder::class,
            SocialLinkSeeder::class,

            /** Dummy data for BookingEvents and Posts */ 
            PostSeeder::class,
            // BookingEventSeeder::class, 
            

        ]);
    }
}
