<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class EsgController extends Controller
{
    public function index()
    {
        return Inertia::render('Esg/Index', [
            'esgUrl' => config('site.esg_url'),
        ]);
    }

    public function leader()
    {
        return Inertia::render('Esg/Leader');
    }
}
