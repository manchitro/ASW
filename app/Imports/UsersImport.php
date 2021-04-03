<?php

namespace App\Imports;

use App\Models\User;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Helpers\SheetHelper;

class UsersImport implements ToCollection //, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            User::create([
                'academicid' => $row[0],
                'firstname' => $row[1],
                'lastname' => $row[1],
                'usertype' => 'student',
            ]);
        }
    }
}
