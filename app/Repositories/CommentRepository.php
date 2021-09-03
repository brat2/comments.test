<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
  public function get(int $skip, int $take, $author = '%'): array
  {
    $comments = Comment::with('user')
      ->join('users', 'users.id', '=', 'comments.user_id')
      ->where('login', 'LIKE', $author)
      ->orderBy('comments.created_at', 'desc')
      ->skip($skip)
      ->take($take)
      ->get();
    return $comments->toArray();
  }

  public function add(Request $req):void
  {
    Comment::create([
      'message' => $req->input('message'),
      'user_id' => Auth::user()->id
    ]);
  }

  public function getAuthor(): array
  {
    $data = Comment::with('user')->join('users', 'users.id', '=', 'comments.user_id')->pluck('login');
    $data = array_unique($data->toArray());
    $data = array_values($data);
    return $data;
  }
}
