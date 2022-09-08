<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; // useする
/*use Illuminate\Http\Request;*/

class PostController extends Controller
{
    /**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
     public function index(Post $post)
     {
         return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
     }
     
     public function show(Post $post)
     {
         return view('show')->with(['post' => $post]);
     }
     
     public function create()
     {
        return view('create');
     }
     
     public function store(Post $post, PostRequest $request)
     {
         $input = $request['post'];
         $post->fill($input)->save();
         return redirect('/posts/' . $post->id);
    }
}
