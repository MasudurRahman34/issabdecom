<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class FootPrintObserver
{
    protected $userID;

    public function __construct(){
        // $this->userID =  Auth::user()->id;
        $this->userID=1;
    }


    public function updating($model)
    {
        $model->modified_by = $this->userID;
    }
    public function creating($model)
    {
        $model->created_by = $this->userID;
    }
    public function deleting($model){
        $model->deleted_by = $this->userID;
    }
}
