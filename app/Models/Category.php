<?php

namespace App\Models;

use App\Http\Controllers\helper\FootPrintObsevant;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes,FootPrintObsevant;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable=[
        'name','parent_id'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
    public function catagories(){
    	return $this->hasMany(Catagory::class, 'parent_id');
    }
    public function childCatagories(){
    	return $this->hasMany(Catagory::class,'parent_id')->with('catagories');
    }
}
