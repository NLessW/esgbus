<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Resources\BoardResource;

class BoardController extends Controller
{
    public function notice(Request $request)
    {
        $limit = 10;
        $page = (int) $request->input('page', 1);

        $boards = Board::notice()->latest()
            ->paginate($limit);
        $boards = BoardResource::collection($boards);

        return Inertia::render('Community/Notice', [
            'boards' => $boards,
            'limit' => $limit,
            'page' => $page,
            'title' => "공지사항",
        ]);
    }

    public function gallery(Request $request)
    {

        $limit = 9;
        $page = (int) $request->input('page', 1);

        $boards = Board::gallery()->latest()
            ->paginate($limit);
        $boards = BoardResource::collection($boards);

        return Inertia::render('Community/Gallery', [
            'boards' => $boards,
            'limit' => $limit,
            'page' => $page,
            'title' => "갤러리",
        ]);
    }

    public function newsroom(Request $request)
    {
        $limit = 9;
        $page = (int) $request->input('page', 1);

        $boards = Board::newsroom()->latest()
            ->paginate($limit);
        $boards = BoardResource::collection($boards);

        return Inertia::render('Community/Gallery', [
            'boards' => $boards,
            'limit' => $limit,
            'page' => $page,
            'title' => "뉴스룸",
        ]);
    }

    public function show(Board $board)
    {
        $board = new BoardResource($board);

        if ($board == null) {
            return to_route('community.private');
        }

        if ($board->type == 'private') {
            if (session('board.private.' . $board->id) == null || session('board.private.' . $board->id) !== $board->password) {
                return Inertia::render('Community/Password', [
                    'board' => $board,
                    'page' => (int) request('page', 1),
                ]);
            }
        }

        return Inertia::render('Community/Show', [
            'board' => $board,
            'page' => (int)request('page', 1)
        ]);
    }
}
