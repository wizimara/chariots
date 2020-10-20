<?php

namespace App\Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $guarded = array('id');
  protected $fillable = array('cat_name');

   public static $rules = array(
    'cat_name' => 'required',

  );

  public static $messages = array(
   'cat_name.required' => 'Name required',

   );

   public function category_models()
    {
        return $this->belongsToMany('App\Modules\Vehicles\Models\Modelcars','model_category','category_id','model_id');
    }

}
