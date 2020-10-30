<?php

namespace App\Imports;

use App\Modules\Vehicles\Models\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToCollection , WithHeadingRow
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
            Category::create([
                'id'=>$row['id'],
                'cat_name' => $row['cat_name'],
            ]);
        }

    }
}
