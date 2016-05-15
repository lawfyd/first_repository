<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests;

class PostController extends Controller
{
    public function index(Post $postModel) {
        //$posts = Post::all();

        //$posts = Post::latest('published_at')->get();
        /*$posts = Post::latest('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->get();*/
        $posts = $postModel->getPublishedPosts();

        return view('post.index', ['posts' => $posts]);
    }

    public function unpublished(Post $postModel) {
        $posts = $postModel->getUpPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }

    public function create() {

        return view('post.create');
    }

    public function store(Post $postModel, Request $request) {
        $post = $postModel->create($request->all());
        //$post->published_at = $postModel->('CURRENT_TIMESTAMP');
        if ($post->published == 'on') {
            $post->published = 1;
        }
        else $post->published = 0;
        $post->save();
        return redirect()->route('posts');
    }
}
