<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Resources\BoardResource;

class HomeController extends Controller
{
    function index(Request $request)
    {
        $boards = Board::notice()
            ->latest()
            ->limit(4)
            ->get();
        $notices = BoardResource::collection($boards);

        $boards = Board::gallery()
            ->latest()
            ->limit(2)
            ->get();
        $galleries = BoardResource::collection($boards);


        return Inertia::render('Home', compact('notices', 'galleries'));
    }
}
