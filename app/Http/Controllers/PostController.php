<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
      //Used of eager loading:
      //orderBy('created_at', 'desc') or latest()
      $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(4);
      return view('posts.index', ['posts' => $posts]); 
   }

   public function store(Request $request){
      $this->validate($request, ['body' => 'required']);

      auth()->user()->posts()->create($request->only('body'));

      return back();
   }

   public function destroy(Post $post) {

      // if (!$post->ownedBy(auth()->user())) {
      //    dd('no');
      // }

      $this->authorize('delete', $post); 

      $post->delete();

      return back();
   }
}