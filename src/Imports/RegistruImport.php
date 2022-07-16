<?php

namespace Decalex\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RegistruImport implements ToCollection {

    
    /** randurile din fisier */
    public $rows = NULL;

    public $header = NULL;
    public $columns = NULL;
    public $registru = NULL;

    public $antet = [];
    public $lines = [];

    public function __construct($header, $columns, $registru) {

        $this->header = $header;
        $this->columns = $columns;
        $this->registru = $registru;
    }

    protected function prepareRows() {
    }

    protected function MakeRegistruAntet() {        
        $this->antet = [
            'number' => $this->rows[1][1],
            'date' => \Carbon\Carbon::createFromFormat('d.m.Y', $this->rows[1][2])->format('Y-m-d'),
            'responsabil_nume' =>  $this->rows[2][1],
            'responsabil_functie' =>  $this->rows[3][1],
        ];
    }

    protected function MakeLines() {  
        $this->lines = [];      
        foreach($this->rows as $i => $row)
        {
           
            if( is_integer($row[0]) )
            {

                if($this->registru->props['hasDepartamente'] == '0')
                {
                    $line = [... $this->columns];
                    $j = 1;
                }
                else
                {
                    $line = [
                        'departament' => $row[1],
                        ... $this->columns
                    ];
                    $j = 1;
                }

         
                foreach($line as $col => $value)
                {
                    $line[$col] = $row[$j++];
                }

                $this->lines[] = $line;
            }
        }
    }

    public function collection(Collection $rows) {
        
        $this->rows = $rows;

        $this->MakeRegistruAntet();

        $this->MakeLines();
    }

    

}