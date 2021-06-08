<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
   public function __construct()
   {
      $this->middleware(['auth'])->only(['store', 'destroy']);
   }

   public function index(){
      //Eager loading orderBy('created_at', 'desc') or latest()
      $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(3);
      return view('posts.index', ['posts' => $posts]); 
   }

   public function show(Post $post){
      return view('posts.show', [
         'post' => $post
      ]);
   }
   
   public function store(Request $request){
		// dd(auth()->user()->id);
		// dd($request);

      $request->body = htmlspecialchars($request->body);

		$this->validate($request, ['body' => 'required']);

	
		DB::table('posts')->insert(
			['user_id' => auth()->user()->id,
			'body' => $request->body,
			'product_id' => $request->id,
			'created_at' => date(now()),
			'updated_at' => date(now()),
			]
		);

		//auth()->user()->posts()->create($request->only('body'));

		//return back();
		return redirect()->to(url()->previous() . '#comments-form');
   }


//    public function commentsWithAjax(Request $request): JsonResponse
//     {
//         // $r = $request->input('value');

//         // DB::table('posts')->insert(
//         //     ['user_id' => auth()->user()->id,
//         //     'body' => $request->body,
//         //     'product_id' => $request->id,
//         //     'created_at' => date(now()),
//         //     'updated_at' => date(now()),
//         //     ]
//       	// );

// 		$posts = Post::where('products_id', $request->id)->paginate(5)->get();

//         return response()->json([
//             'posts' => $posts 
//         ]);
//     }


   public function destroy(Post $post) {

      // if (!$post->ownedBy(auth()->user())) {
      //    dd('no');
      // }

      $this->authorize('delete', $post); 

      $post->delete();

      return back();
   }
}