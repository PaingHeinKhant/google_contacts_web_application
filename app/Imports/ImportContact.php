<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportContact implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'firstName' => $row[0],
            'lastName' => $row[1],
            'company' => $row[2],
            'email' => $row[3],
            'phone' => $row[4],
            'birthday'=>$row[5],
//            'user_id'=>$row[6],
            'note'=>$row[6],
        ]);
    }
}
