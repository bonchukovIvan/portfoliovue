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
            'title'        => 'required|max:256',
            'description'  => 'required|min:5',
            'preview_path' => 'required',
        ]);
        $portfolio_item = PortfolioItem::create([
            'title'        => $request['title'],
            'description'  => $request['description'],
            'site_link'    => $request['site_link'],
            'git_link'     => $request['git_link'],
            'preview_path' => ''
        ]);
        $portfolio_item->update(
            ['preview_path' => $this->save_to_storage($portfolio_item->id, $request['preview_path'])]
        );

        if(request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {             
                $portfolio_image_item = PortfolioImage::create([
                    'path'    => $this->save_to_storage($portfolio_item->id, $image),
                    'item_id' => $portfolio_item->id,
                ]);
                $portfolio_image_item->save();
            }
        }
        $portfolio_item->save();
        
        return $portfolio_item;
    }

    public function save_to_storage($id, $file) {
        $file_name = Hash::make($id . $file->getClientOriginalName());
        $file_name = str_replace('/', '', $file_name) . '.' . $file->extension();

        if ($file->storeAs('public', $file_name)) {
            return '/public/storage/'.$file_name;
        }
        return null;
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
