<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Skills;
use Illuminate\Support\Facades\Hash;

class SkillsController extends Controller
{
    public function index(): Response
    {
        $skills = Skills::all();
        return Inertia::render('Skills/Skills', [
            'skills' => $skills
        ]);
    }

    public function create(Request $request)
    {   
        $request->validate([
            'title' => 'required|max:25',
            'image' => 'required|image|extensions:jpg,png,webp',
        ]);
        $skill = Skills::create([
            'title' => $request['title'],
            'slink' => $request['slink']
        ]);
        if(request()->hasFile('image')) {
            $image = Hash::make($skill->id.request()->file('image')->getClientOriginalName());
            $image = str_replace('/', '',$image).'.'.request()->file('image')->extension();
            request()->file('image')->storeAs('public', $image);
            $skill->update(['image' => '/public/storage/'.$image]);
        }
        $skill->save();
        return redirect()->route('skills.index');
    }

    public function edit($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:25',
        ]);
        $skill = Skills::findOrFail($id);
        if(request()->hasFile('image')) {
            $request->validate([
                'image' => 'extensions:jpg,png',
            ]);
            if ($skill->image) {
                Storage::delete(str_replace('/public/storage/', 'public/', $skill->image));
            }
            $image = Hash::make($skill->id.request()->file('image')->getClientOriginalName());
            $image = str_replace('/', '',$image).'.'.request()->file('image')->extension();
            request()->file('image')->storeAs('public', $image);
            $skill->update(['image' => '/public/storage/'.$image]);
        }
        $skill->update([
            'title' => $request['title'],
            'slink' => $request['slink']
        ]);
        return redirect()->route('skills.index');
    }

    public function show($id): Response
    {
        $baseUrl = config('app.url');
        $skill = Skills::findOrFail($id);
        return $skill;

    }

    public function destroy($id)
    {
        $baseUrl = config('app.url');
        $skill = Skills::findOrFail($id);
        if ($skill->image) {
            Storage::delete(str_replace('/public/storage/', 'public/', $skill->image));
        }
        $skill->delete();
        return redirect()->route('skills.index');
    }
}
