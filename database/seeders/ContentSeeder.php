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
