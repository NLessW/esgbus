<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return Inertia::render('Donation/Index');
    }
}
