<?php
namespace App\Http\Services;

use App\Http\Controllers\helper\ApiResponse;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService{
    use ApiResponse;
    public function store($resquest)
    {
       
        try {
            DB::begintransaction();
            $category= new Category();
            $category->name= $resquest->name;
            $category->parent_id=$resquest->parent_id;
            $category->save();
            DB::commit();
            return $this->success($category,200);
        } catch (\Exception $e) {
            
            //$this->error($e->getMessage(),422);
            return $e->getMessage();
            DB::rollBack();
        }

    }
    public function update($resquest){

    }
    public function delete($id){

    }
}
