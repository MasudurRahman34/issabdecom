<?php

namespace App\Http\Controllers\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\helper\ApiResponse;
use App\Http\Requests\V1\CategoryRequest;
use App\Http\Services\CategoryService;

class CategoryController extends Controller
{ use ApiResponse;
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService=$categoryService;
    }
   
    public function index()
    {
        return 'working';
    }

    
    public function create()
    {
        //
    }

    
    public function store(CategoryRequest $request)
    {
        

        $category = $this->categoryService->store($request);
        return $category;
    }

  
    public function show(Category $category)
    {
        //
    }

  
    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
