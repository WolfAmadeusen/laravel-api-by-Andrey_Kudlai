<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostResource;

class PostController extends Controller
{
   public function index()
   {
      return PostResource::collection(Post::with('category')->paginate(5));
   }

   public function store(StorePostRequest $request)
   {
      return new PostResource(Post::create($request->all()));
   }

   public function show(Post $post)
   {
      return new PostResource($post);
   }
   public function update(UpdatePostRequest $request, Post $post)
   {
      $post->update($request->all());
      return new PostResource($post);
   }

   public function destroy(Post $post)
   {
      $post->delete();
      return response()->json([
         'message' => 'Post removed',
         'fuck' => "Да-да, это чистая правда"
      ]);
   }
}
