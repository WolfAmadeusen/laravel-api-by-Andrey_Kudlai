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
      // return Category::all();
      return response()->json(
         [
            'status' => '301',
            'title' => 'Lorem ipsung',
            'category' => 'Lorem',
            'discription' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa laborum aliquid eum? Porro, laboriosam corrupti tenetur quas nam odit soluta, quaerat ratione ex rerum velit repellat amet. Sunt, placeat. Quasi at sapiente ipsam repudiandae eos laborum quae, eaque delectus facilis deleniti, vel eveniet eum rerum. Dolores, eius. Blanditiis, corporis alias!',
         ],
      );
   }

   public function store(StoreCategoryRequest $request)
   {
      return Category::create($request->all());
   }
   public function show(Category $category)
   {
      return $category;
   }
   public function update(UpdateCategoryRequest $request, Category $category) {}
   public function destroy(Category $category) {}
}
