<?php

namespace App\Imports;

use App\Modules\Vehicles\Models\Category;
use App\Modules\Vehicles\Models\Modelcars;
use App\Modules\Vehicles\Models\Make;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModelsImport implements ToCollection , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

      public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
          $make =Make::where('make_name',$row['make_name'])->first();
          $category =Category::where('cat_name',$row['cat_name'])->first();
          $models=Modelcars::where('model_name',$row['model_name'].' - '.$row['generation_number'])->first();
          if(!$models){
            $modelcar=New Modelcars();
            $modelcar->model_name=$row['model_name'].' - '.$row['generation_number'];
            $modelcar->make_id =$make->id??0;
            $modelcar->save();
            if($category){
              $category->category_models()->attach($modelcar->id);
            }
          }


        }

    }
}
