<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Skills;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(): Response
    {
        $skills = Skills::all();
        return Inertia::render('Home', [
            'skills' => $skills
        ]);
    }
}
