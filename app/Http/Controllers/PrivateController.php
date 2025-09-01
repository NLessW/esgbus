<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\BoardResource;
use Illuminate\Support\Facades\Redirect;

class PrivateController extends Controller
{
    public function index(Request $request)
    {
        $limit = 10;
        $page = (int) $request->input('page', 1);

        $boards = Board::private()->latest()
            ->paginate($limit);
        $boards = BoardResource::collection($boards);

        return Inertia::render('Community/Private', [
            'boards' => $boards,
            'limit' => $limit,
            'page' => $page,
            'title' => "1:1문의",
        ]);
        return Inertia::render('Community/Private');
    }


    // 1:1문의 등록
    public function create(Request $request)
    {
        $board = null;
        if ($request->id) {
            $board = Board::find($request->id);
            if ($board == null) {
                return to_route('community.private');
            }
            $board = [
                'id' => $board->id,
                'type' => $board->type,
                'name' => $board->name,
                'title' => $board->title,
                'content' => $board->content,
            ];
        }

        $type = 'private';
        return Inertia::render('Community/Create', [
            'title' => "1:1문의 등록",
            'type' => $type,
            'board' => $board,
            'page' => (int) request('page', 1),
        ]);
    }

    // 1:1문의 등록
    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required'],
            'name' => ['required'],
            'title' => ['required'],
            'content' => ['required',],
            'password' => ['required',],
        ]);

        $board = Board::create([
            'type' => $request->type,
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'password' => Hash::make($request->password),
        ]);

        return Redirect::back()->with('success', '정상적으로 문의가 등록되었습니다.');
    }

    // 비밀번호 확인
    public function password(Request $request)
    {

        $board = Board::find($request->id);
        if ($board == null) {
            return Redirect::back()->with('error', '해당 게시글이 존재하지 않습니다.');
        }

        if (!Hash::check($request->password, $board->password)) {
            return Redirect::back()->with('error', '비밀번호가 맞지 않습니다.');
        }

        // 세션 등록
        $request->session()->put('board.private.' . $board->id, $board->password);

        return to_route('community.show', ['board' => $board->id, 'page' => $request->page]);
    }


    public function update(Request $request)
    {
        $board = Board::find($request->id);
        if ($board == null) {
            return Redirect::back()->with('error', '해당 게시글이 존재하지 않습니다.');
        }

        $board->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return Redirect::back()->with('success', '정상적으로 문의가 수정되었습니다.');
    }

    public function destroy(Request $request)
    {
        $board = Board::find($request->id);
        if ($board == null) {
            return Redirect::back()->with('error', '해당 게시글이 존재하지 않습니다.');
        }

        $board->delete();

        return to_route('community.private');
    }
}
