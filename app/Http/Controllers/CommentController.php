<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $CommentRepository)
    {
        $this->commentRepository = $CommentRepository;
    }

    public function index()
    {
        $data = $this->commentRepository->get(0, 3);
        return view('blog-single', ['data' => $data]);
    }

    public function get(Request $req): array
    { 
        $data = $this->commentRepository->get($req->skip, $req->take, $req->author);
        return $data;
    }

    public function add(Request $req)
    {
        $this->commentRepository->add($req);
    }


    public function filter(): array
    {
        $data = $this->commentRepository->getAuthor();
        return $data;
    }

}
