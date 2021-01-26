<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'jbk' => is_null($row[0]) ? '/' : $row[0],
            'konzola' => is_null($row[1]) ? '/' : $row[1],
            'opstina' => is_null($row[2]) ? '/' : $row[2],
            'address' => is_null($row[3]) ? '/' : $row[3], 
            'name' => is_null($row[4]) ? '/' : $row[4],
            'phone_number' => is_null($row[5]) ? '000000000' : $row[5],
            'number_of_rent' => is_null(@$row[6]) ? '0' : @$row[6], 
            'money_spent' => is_null(@$row[7]) ? '0' : @$row[7],
            'comment' => is_null(@$row[8]) ? 'No comment' : @$row[8],
        ]);
    }
}
