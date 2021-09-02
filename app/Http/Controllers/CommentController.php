<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req): void
    {
        Comment::create([
            'message' => $req->input('message'),
            'user_id' => Auth::user()->id
        ]);
    }

    public function index()
    {
        $comments = Comment::with('user')->take(3)->get();
        return view('blog-single', ['data' => $comments]);
    }

    public function more(int $skip = 0): array
    {
        $comments = Comment::with('user')->skip($skip)->take(3)->get();
        return $comments->toArray();
    }

    public function filter(Request $req): array
    {
        $enter = $req->get('enter');
        $data = Comment::with('user')->join('users', 'users.id', '=', 'comments.user_id')->pluck('login');
        $data = array_unique($data->toArray());
        $data = array_values($data);

        return $data;
    }
}
