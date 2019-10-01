<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) : array
    {
        $i = 0;
        foreach ($row as $key=>$value){
            echo ($key);
            echo "\n";
        }
    }

    /**
     * @param array $array
     */
    public function array(array $array)
    {
        return $array;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        dd($collection);
    }
}
