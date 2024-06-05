<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\PortfolioItem;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolio_items = PortfolioItem::with('images')->get();
        return Inertia::render('Portfolio/Index',[
            'portfolio_items' => $portfolio_items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:25',
            'description' => 'required|min:5',
        ]);
        $portfolio_item = PortfolioItem::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'site_link' => $request['site_link'],
            'git_link' => $request['git_link'],
        ]);

        if(request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {
                $portfolio_image = Hash::make($portfolio_item->id.$image->getClientOriginalName());
                $portfolio_image = str_replace('/', '',$portfolio_image).'.'.$image->extension();
                
                $image->storeAs('public', $portfolio_image);
                $portfolio_image_item = PortfolioImage::create([
                    'path' => '/public/storage/'.$portfolio_image,
                    'item_id' => $portfolio_item->id,
                ]);
                $portfolio_image_item->save();
            }
        }
        $portfolio_item->save();
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PortfolioItem $portfolioItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortfolioItem $portfolioItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioItem $portfolioItem)
    {
        //
    }
}
