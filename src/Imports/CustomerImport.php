<?php

namespace B2B\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomerImport implements ToCollection {


    /** indexul curent in fisier */
    public $index = 0;

    /** randurile din fisier */
    public $rows = NULL;

    public $customers = [];

    public function __construct() {
    }

    protected function prepareRows() {
        foreach($this->rows as $i => $row)
        {
            if($i > 0)
            {
                $row['empty'] = is_null($row[1]);
            }
        }
    }

    protected function CreateCustomers($i) {
        if($i < $this->rows->count() && ! $this->rows[$i]['empty'])
        {
            
            $this->customers[$this->rows[$i][0]] = [
                'name' => $this->rows[$i][1],
                'slug' => \Str::slug($this->rows[$i][1]),
                'vat' => $this->rows[$i][2],
                'status' => $this->rows[$i][3],
                'email' => $this->rows[$i][4],
                'phone' => $this->rows[$i][5],
                'city' => $this->rows[$i][6],
                'region' => $this->rows[$i][7],
                'country' => $this->rows[$i][8],
                'street' => $this->rows[$i][9],
                'street_number' => $this->rows[$i][10],
                'postal_code'=> $this->rows[$i][11],
            ];
            
            $this->CreateCustomers($i + 1);
        }
    }

    public function collection(Collection $rows) {
        
        $this->index = 1;
        $this->rows = $rows;

        $this->prepareRows();

        $this->CreateCustomers(1);
    }

    

}