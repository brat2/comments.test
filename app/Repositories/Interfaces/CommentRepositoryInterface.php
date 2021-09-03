<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
  public function get(int $skip, int $take, $author = '%'): array;

  public function add(Request $req);

  public function getAuthor(): array;
}
