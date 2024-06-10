<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Hash;
use URL;

use App\Models\Skills;
use App\Models\PortfolioItem;

class HomeController extends Controller
{
    public function index(): Response
    {
        $skills = Skills::all();
        $portfolio = PortfolioItem::with('images')->get();
        
        return Inertia::render('Home', [
            'skills' => $skills,
            'portfolio' => $portfolio,
            'contacts_url' => URL::route('home.contacts'),
        ]);
    }
    public function show_portfolio($id)
    {
        $portfolio = PortfolioItem::with('images')->find($id);
        
        return Inertia::render('Portfolio', [
            'portfolio' => $portfolio
        ]);
    }

    public function contacts()
    {
        return Inertia::render('Contacts');
    }
}
