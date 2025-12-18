<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get 3 random items
        $featuredMenus = Menu::inRandomOrder()->limit(3)->get();
        $content = \App\Models\Content::where('page', 'home')->get()->keyBy(function($item) {
            return $item->section . '_' . $item->key;
        });

        return view('home', compact('featuredMenus', 'content'));
    }
}
