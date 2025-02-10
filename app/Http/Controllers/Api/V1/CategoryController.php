<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
   public function index()
   {
      Log::info('Всё хорошо работает');
      return Category::all();
   }

   public function store(StoreCategoryRequest $request)
   {
      return Category::create($request->all());
   }

   public function show(Category $category)
   {
      return $category;
   }

   public function update(UpdateCategoryRequest $request, Category $category) {
      $category->update($request->all());

      return $category;
   }

   public function destroy(Category $category) {
      $category->delete();
      return response()->json([
         'message'=>"Category removed"
      ]);
   }
}
