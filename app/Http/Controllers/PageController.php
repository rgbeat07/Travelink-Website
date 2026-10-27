<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Hero;
use App\Models\portfolio;
use App\Models\souvenirCatalog;
use App\Models\Team;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $hero = Hero::first();
        $contact = Contact::first();
        $teams = Team::all();

        $featuredPortfolios = portfolio::with('category')
            ->where('is_featured', true)
            ->take(3)
            ->get();

        if ($featuredPortfolios->isEmpty()) {
            $featuredPortfolios = portfolio::with('category')->take(3)->get();
        }

        return view('home', compact('hero', 'contact', 'teams', 'featuredPortfolios'));
    }

    public function portofolio(): View
    {
        $portfolios = portfolio::with('category')->get();
        $categories = Category::where('type', 'portfolio')->get();
        $contact = Contact::first();

        return view('portofolio', compact('portfolios', 'categories', 'contact'));
    }

    public function katalogSuvenir(): View
    {
        $souvenirs = souvenirCatalog::with('category')->get();
        $categories = Category::where('type', 'souvenir')->get();
        $contact = Contact::first();

        return view('katalog-suvenir', compact('souvenirs', 'categories', 'contact'));
    }
}
