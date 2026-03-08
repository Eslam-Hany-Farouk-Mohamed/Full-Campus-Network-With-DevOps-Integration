<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\City;
use App\Models\Region;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Egyptian cities with Arabic names
        $cities = [
            ['name' => 'Cairo', 'name_ar' => 'القاهرة'],
            ['name' => 'Alexandria', 'name_ar' => 'الإسكندرية'],
            ['name' => 'Giza', 'name_ar' => 'الجيزة'],
            ['name' => 'Mansoura', 'name_ar' => 'المنصورة'],
            ['name' => 'Tanta', 'name_ar' => 'طنطا'],
            ['name' => 'Aswan', 'name_ar' => 'أسوان'],
        ];

        foreach ($cities as $cityData) {
            City::create($cityData);
        }

        // Seed regions for Cairo
        $cairoRegions = [
            ['city_id' => 1, 'name' => 'Nasr City', 'name_ar' => 'مدينة نصر'],
            ['city_id' => 1, 'name' => 'Heliopolis', 'name_ar' => 'مصر الجديدة'],
            ['city_id' => 1, 'name' => 'Maadi', 'name_ar' => 'المعادي'],
            ['city_id' => 1, 'name' => 'Dokki', 'name_ar' => 'الدقي'],
            ['city_id' => 1, 'name' => 'Mohandessin', 'name_ar' => 'المهندسين'],
        ];

        // Seed regions for Alexandria
        $alexRegions = [
            ['city_id' => 2, 'name' => 'Smouha', 'name_ar' => 'سموحة'],
            ['city_id' => 2, 'name' => 'Sidi Gaber', 'name_ar' => 'سيدي جابر'],
            ['city_id' => 2, 'name' => 'Mandara', 'name_ar' => 'المندرة'],
        ];

        // Seed regions for Giza
        $gizaRegions = [
            ['city_id' => 3, 'name' => 'Haram', 'name_ar' => 'الهرم'],
            ['city_id' => 3, 'name' => 'Faisal', 'name_ar' => 'فيصل'],
            ['city_id' => 3, 'name' => '6th of October', 'name_ar' => '6 أكتوبر'],
        ];

        foreach (array_merge($cairoRegions, $alexRegions, $gizaRegions) as $region) {
            Region::create($region);
        }

        // Create test users
        $student = User::create([
            'name' => 'Ahmed Student',
            'email' => 'student@test.com',
            'password' => 'password',
            'role_id' => 1, // student
            'language' => 'ar',
        ]);

        $owner = User::create([
            'name' => 'Mohamed Owner',
            'email' => 'owner@test.com',
            'password' => 'password',
            'role_id' => 2, // owner
            'language' => 'ar',
        ]);

        $broker = User::create([
            'name' => 'Ali Broker',
            'email' => 'broker@test.com',
            'password' => 'password',
            'role_id' => 3, // broker
            'language' => 'ar',
        ]);

        // Create sample listings
        $listings = [
            [
                'user_id' => $owner->id,
                'title' => 'Cozy Studio near Cairo University',
                'title_ar' => 'استوديو مريح بالقرب من جامعة القاهرة',
                'description' => 'A fully furnished studio apartment, perfect for students.',
                'description_ar' => 'استوديو مفروش بالكامل، مثالي للطلاب.',
                'price' => 3500,
                'city_id' => 1,
                'region_id' => 1,
                'type' => 'studio',
                'bedrooms' => 1,
                'bathrooms' => 1,
            ],
            [
                'user_id' => $owner->id,
                'title' => 'Shared Room in Dokki',
                'title_ar' => 'غرفة مشتركة في الدقي',
                'description' => 'Affordable shared room with access to all amenities.',
                'description_ar' => 'غرفة مشتركة بسعر مناسب مع جميع المرافق.',
                'price' => 1500,
                'city_id' => 1,
                'region_id' => 4,
                'type' => 'shared',
                'bedrooms' => 1,
                'bathrooms' => 1,
            ],
            [
                'user_id' => $broker->id,
                'title' => '2BR Apartment in Smouha',
                'title_ar' => 'شقة غرفتين في سموحة',
                'description' => 'Spacious 2 bedroom apartment near Alexandria University.',
                'description_ar' => 'شقة واسعة بغرفتين نوم بالقرب من جامعة الإسكندرية.',
                'price' => 5000,
                'city_id' => 2,
                'region_id' => 6,
                'type' => 'apartment',
                'bedrooms' => 2,
                'bathrooms' => 1,
            ],
        ];

        foreach ($listings as $listing) {
            Listing::create($listing);
        }
    }
}
