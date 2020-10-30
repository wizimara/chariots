<?php

namespace App\Imports;

use App\Modules\Vehicles\Models\Make;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MakesImport implements ToCollection , WithHeadingRow
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
            Make::create([
                'make_name' => $row['make_name'],
            ]);
        }

    }
}
