<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Helper to avoid repetition
        $create = function($page, $section, $key, $content, $type) {
            Content::firstOrCreate(
                ['page' => $page, 'section' => $section, 'key' => $key],
                ['content' => $content, 'type' => $type]
            );
        };

        // Home Page
        $create('home', 'hero', 'title', 'Welcome to Kantin Wakaf', 'text');
        $create('home', 'hero', 'description', 'Delicious food, affordable prices, and a comfortable atmosphere.', 'textarea');
        $create('home', 'hero', 'bg_image', 'https://placehold.co/1200x600?text=Kantin+Ambiance', 'image');
        
        $create('home', 'intro', 'title', 'Why Choose Us?', 'text');
        $create('home', 'intro', 'description', 'Kantin Wakaf provides a variety of healthy and tasty meals prepared with high hygiene standards.', 'textarea');
        $create('home', 'intro', 'image', 'https://placehold.co/600x400?text=About+Us', 'image');

        // New Promo Sections (v1.4.0)
        // Promo 1
        $create('home', 'promo_1', 'title', 'Signature Wakaf Bowl', 'text');
        $create('home', 'promo_1', 'description', 'Experience the perfect blend of nutrition and taste with our signature bowl.', 'textarea');
        $create('home', 'promo_1', 'image', 'https://placehold.co/800x600?text=Signature+Bowl', 'image');

        // Promo 2
        $create('home', 'promo_2', 'title', 'Prioritize Your Health', 'text');
        $create('home', 'promo_2', 'description', 'Fresh ingredients, zero preservatives. Eat cleaner, live better.', 'textarea');
        $create('home', 'promo_2', 'image', 'https://placehold.co/800x600?text=Healthy+Food', 'image');

        // Promo 3
        $create('home', 'promo_3', 'title', 'Student Wallet Friendly', 'text');
        $create('home', 'promo_3', 'description', 'Get premium quality meals at prices that fit your student budget.', 'textarea');
        $create('home', 'promo_3', 'image', 'https://placehold.co/800x600?text=Student+Promo', 'image');

        // Promo 4
        $create('home', 'promo_4', 'title', 'Tech & Coffee Events', 'text');
        $create('home', 'promo_4', 'description', 'Join our weekly community gatherings and share your ideas.', 'textarea');
        $create('home', 'promo_4', 'image', 'https://placehold.co/800x600?text=Community', 'image');

        $create('home', 'hours', 'mon_fri', '08:00 AM - 04:00 PM', 'text');
        $create('home', 'hours', 'saturday', '08:00 AM - 02:00 PM', 'text');
        $create('home', 'hours', 'sunday', 'Closed', 'text');

        // About Page
        $create('about', 'main', 'title', 'About Kantin Wakaf', 'text');
        $create('about', 'main', 'description', 'A modern canteen dedicated to serving healthy, affordable, and delicious meals.', 'textarea');
        $create('about', 'main', 'image', 'https://placehold.co/600x600?text=About+Kantin', 'image');
        $create('about', 'mission', 'text', 'To serve high-quality food with speed, hygiene, and affordability.', 'textarea');

        // Contact Page
        $create('contact', 'info', 'whatsapp', '+62 812-3456-7890', 'text');
        $create('contact', 'info', 'instagram', '@kantinwakaf', 'text');
        $create('contact', 'info', 'email', 'info@kantinwakaf.com', 'text');
        $create('contact', 'info', 'address', 'Jl. Sejahtera No. 123, Jakarta Selatan, Indonesia', 'textarea');
    }
}
