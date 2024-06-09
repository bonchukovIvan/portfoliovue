<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Skills;
use App\Models\PortfolioItem;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(): Response
    {
        $skills = Skills::all();
        $portfolio = PortfolioItem::with('images')->get();
        
        return Inertia::render('Home', [
            'skills' => $skills,
            'portfolio' => $portfolio
        ]);
    }
    public function show_portfolio($id)
    {
        $portfolio = PortfolioItem::with('images')->find($id);
        
        return Inertia::render('Portfolio', [
            'portfolio' => $portfolio
        ]);
    }
}
