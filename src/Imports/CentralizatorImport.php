<?php

namespace Decalex\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CentralizatorImport implements ToCollection {

    protected static $types = [
        'Text scurt' => 'C',
        'Text lung' => 'E',
        'Numar' => 'I',
        'Data' => 'D',
        'Data si ora' => 'T',
        'Optiuni' => 'O',
    ];

    public $centralizator_id = NULL;

    /** se produce ca rezultat lista intrebarilor */
    public $columns = [];

    /** indexul curent in fisier */
    public $index = 0;

    /** randurile din fisier */
    public $rows = NULL;

    public function __construct($centralizator_id) {
        $this->centralizator_id = $centralizator_id;
    }

    protected function prepareRows() {
        foreach($this->rows as $i => $row)
        {
            if($i > 0)
            {
                $row['empty'] = is_null($row[0]) && 
                                is_null($row[1]) && 
                                is_null($row[2]) &&
                                is_null($row[3]) &&
                                is_null($row[4]);
            }
        }
    }

    protected function CreateColumns($i) {
        if($i < $this->rows->count() && ! $this->rows[$i]['empty'])
        {
            
            $this->columns[$this->rows[$i][0]] = [
                'caption' => $this->rows[$i][1],
                'type' => self::$types[$this->rows[$i][2]],
                'width' => $this->rows[$i][3],
                'props' => ! $this->rows[$i][4] ? NULL : [
                    'options' =>  
                        collect(explode(',', $this->rows[$i][4]))->map(function($item) {
                            return [
                                'text' => $item,
                                'value' => \Str::slug($item),
                            ];
                        })->toArray(),
                    ],
            ];
            
            $this->CreateColumns($i + 1);
        }
    }

    public function collection(Collection $rows) {
        
        $this->index = 1;
        $this->rows = $rows;

        $this->prepareRows();

        $this->CreateColumns(1);
    }

    

}