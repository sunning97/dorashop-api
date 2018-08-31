<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name','slug','parent_id','description'];
    public $timestamps =true;

    public function subCategories(){
        return $this->hasMany($this,'parent_id','id');
    }
}
