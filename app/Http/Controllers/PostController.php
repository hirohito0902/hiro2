<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; // useする
/*use Illuminate\Http\Request;*/
use App\Category;

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
     
     /*
     public function create()
     {
        return view('create');
     }
     */
     
     public function create(Category $category)
     {
         return view('posts/create')->with(['categories' => $category->get()]);;
     }
     
     public function store(Post $post, PostRequest $request)
     {
         $input = $request['post'];
         $post->fill($input)->save();
         return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
