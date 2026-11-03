<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\SouvenirCatalog;
use App\Models\Team;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $hero = Hero::first();
        $contact = Contact::first();
        $teams = Team::all();

        $featuredPortfolios = Portfolio::where('is_featured', true)
            ->take(3)
            ->get();

        if ($featuredPortfolios->isEmpty()) {
            $featuredPortfolios = Portfolio::take(3)->get();
        }

        return view('home', compact('hero', 'contact', 'teams', 'featuredPortfolios'));
    }

    public function portfolio(): View
    {
        $portfolios = Portfolio::all();
        $contact = Contact::first();

        return view('portfolio', compact('portfolios', 'contact'));
    }

    public function katalogSuvenir(): View
    {
        $souvenirs = SouvenirCatalog::all();
        $contact = Contact::first();

        return view('katalog-suvenir', compact('souvenirs', 'contact'));
    }
}
