<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req)
    { 
        Comment::create([
            'message' => $req->input('message'),
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('home');
    }

    public function index()
    {
        $comments = Comment::with('user')->get();

        return view('blog-single', ['data' => $comments]);
    }
}
