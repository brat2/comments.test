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
        $comments = Comment::with('user')->get();

        return view('blog-single', ['data' => $comments]);
    }
    public function filtr(Request $req):array
    {
        $data= [];
        $enter = $req->get('enter');
        $data = ['kultura', 'admin'];
       // $data = Comment::with('user')->get('login');
        return $data;
    }
}
