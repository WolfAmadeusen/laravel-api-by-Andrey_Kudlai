<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
   public function index()
   {
      return Post::all();
   }

   public function store(StorePostRequest $request)
   {
      return Post::create($request->all());
   }

   public function show(Post $post)
   {
      if ($post->id == 3) {
         return response()->json([
            'message' => "Forbidden",
            "code" => 404
         ], 403);
      }
      return $post;
   }
   public function update(UpdatePostRequest $request, Post $post)
   {
      $post->update($request->all());
      return $post;
   }

   public function destroy(Post $post) {
      $post->delete();
      return response()->json([
         'message'=>'Post removed',
         'fuck'=> "Да, это чистая правда"
      ]);
   }
}