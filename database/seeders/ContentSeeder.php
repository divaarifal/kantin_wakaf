<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Home Page
        Content::create(['page' => 'home', 'section' => 'hero', 'key' => 'title', 'content' => 'Welcome to Kantin Wakaf', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'hero', 'key' => 'description', 'content' => 'Delicious food, affordable prices, and a comfortable atmosphere.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'hero', 'key' => 'bg_image', 'content' => 'https://placehold.co/1200x600?text=Kantin+Ambiance', 'type' => 'image']);
        
        Content::create(['page' => 'home', 'section' => 'intro', 'key' => 'title', 'content' => 'Why Choose Us?', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'intro', 'key' => 'description', 'content' => 'Kantin Wakaf provides a variety of healthy and tasty meals prepared with high hygiene standards.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'intro', 'key' => 'image', 'content' => 'https://placehold.co/600x400?text=About+Us', 'type' => 'image']);

        // New Promo Sections (v1.4.0)
        // Promo 1
        Content::create(['page' => 'home', 'section' => 'promo_1', 'key' => 'title', 'content' => 'Signature Wakaf Bowl', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'promo_1', 'key' => 'description', 'content' => 'Experience the perfect blend of nutrition and taste with our signature bowl.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'promo_1', 'key' => 'image', 'content' => 'https://placehold.co/800x600?text=Signature+Bowl', 'type' => 'image']);

        // Promo 2
        Content::create(['page' => 'home', 'section' => 'promo_2', 'key' => 'title', 'content' => 'Prioritize Your Health', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'promo_2', 'key' => 'description', 'content' => 'Fresh ingredients, zero preservatives. Eat cleaner, live better.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'promo_2', 'key' => 'image', 'content' => 'https://placehold.co/800x600?text=Healthy+Food', 'type' => 'image']);

        // Promo 3
        Content::create(['page' => 'home', 'section' => 'promo_3', 'key' => 'title', 'content' => 'Student Wallet Friendly', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'promo_3', 'key' => 'description', 'content' => 'Get premium quality meals at prices that fit your student budget.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'promo_3', 'key' => 'image', 'content' => 'https://placehold.co/800x600?text=Student+Promo', 'type' => 'image']);

        // Promo 4
        Content::create(['page' => 'home', 'section' => 'promo_4', 'key' => 'title', 'content' => 'Tech & Coffee Events', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'promo_4', 'key' => 'description', 'content' => 'Join our weekly community gatherings and share your ideas.', 'type' => 'textarea']);
        Content::create(['page' => 'home', 'section' => 'promo_4', 'key' => 'image', 'content' => 'https://placehold.co/800x600?text=Community', 'type' => 'image']);

        Content::create(['page' => 'home', 'section' => 'hours', 'key' => 'mon_fri', 'content' => '08:00 AM - 04:00 PM', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'hours', 'key' => 'saturday', 'content' => '08:00 AM - 02:00 PM', 'type' => 'text']);
        Content::create(['page' => 'home', 'section' => 'hours', 'key' => 'sunday', 'content' => 'Closed', 'type' => 'text']);

        // About Page
        Content::create(['page' => 'about', 'section' => 'main', 'key' => 'title', 'content' => 'About Kantin Wakaf', 'type' => 'text']);
        Content::create(['page' => 'about', 'section' => 'main', 'key' => 'description', 'content' => 'A modern canteen dedicated to serving healthy, affordable, and delicious meals.', 'type' => 'textarea']);
        Content::create(['page' => 'about', 'section' => 'main', 'key' => 'image', 'content' => 'https://placehold.co/600x600?text=About+Kantin', 'type' => 'image']);
        Content::create(['page' => 'about', 'section' => 'mission', 'key' => 'text', 'content' => 'To serve high-quality food with speed, hygiene, and affordability.', 'type' => 'textarea']);

        // Contact Page
        Content::create(['page' => 'contact', 'section' => 'info', 'key' => 'whatsapp', 'content' => '+62 812-3456-7890', 'type' => 'text']);
        Content::create(['page' => 'contact', 'section' => 'info', 'key' => 'instagram', 'content' => '@kantinwakaf', 'type' => 'text']);
        Content::create(['page' => 'contact', 'section' => 'info', 'key' => 'email', 'content' => 'info@kantinwakaf.com', 'type' => 'text']);
        Content::create(['page' => 'contact', 'section' => 'info', 'key' => 'address', 'content' => 'Jl. Sejahtera No. 123, Jakarta Selatan, Indonesia', 'type' => 'textarea']);
    }
}
