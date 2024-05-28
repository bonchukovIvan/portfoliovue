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
        $baseUrl = config('app.url');
        $skills = Skills::all()->map(function ($skill) use ($baseUrl) {
            $skill->image_path = $skill->image ? $baseUrl . $skill->image : null;
            return $skill;
        });;

        return Inertia::render('Skills/Skills', [
            'skills' => $skills
        ]);
    }

    public function create(Request $request)
    {
        $skill = Skills::create([
            'title' => $request['title']
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

    public function edit(Request $request): Response
    {
        return true;
    }

    public function show(): Response
    {
        $skills = Skills::all();
        return Inertia::render('Skills/Skills', [
            'skills' => $skills
        ]);
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
