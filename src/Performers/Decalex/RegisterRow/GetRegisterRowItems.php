<?php

namespace B2B\Performers\Decalex\RegisterRow;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Models\Decalex\RegisterColumn;
use B2B\Models\Decalex\RegisterRow;

class GetRegisterRowItems extends GetItems {

    public function Action() {

        /**
         * toate coloanele registrului ROPA definite
         */
        $columns = RegisterColumn::where('register_id', $this->input['register_id'])
            ->orderBy('order_no')
            ->get()
            ->toArray();

        /**
         * randurile existente (deja completate) in ROPA
         */
        $rows = RegisterRow::with('values')
            ->where('register_id', $this->input['register_id'])
            ->where('customer_id', $this->input['customer_id'])
            ->get()
            ->toArray();

        foreach($rows as $i => $row)
        {
            foreach($columns as $j => $column)
            {
                $v = collect($row['values'])->first(function($value, $key) use ($column){
                    return $value['column_id'] == $column['id'];
                });
                $rows[$i]['column-' . $column['id']] = $v ? $v['value'] : NULL;

                $rows[$i] = collect($rows[$i])->except(['values'])->toArray();
            }
        }

        $searched = NULL;
        if( array_key_exists('quicksearch', $this->input) && $this->input['quicksearch'])
        {
            $searched = \DB::connection()->getPdo()->quote($this->input['quicksearch']);
            $searched = \Str::lower(substr($searched, 1, strlen($searched) - 2));

            $rows = collect($rows)->filter(function($row, $i) use ($columns, $searched){
                $r = FALSE;
                foreach($columns as $j => $column)
                {
                    $value =  \Str::lower($row['column-' . $column['id']]);
                    if(\Str::contains($value, $searched))
                    {
                        $r = TRUE;
                    }
                }
                return $r;
            })->values();
        }

        $column_id = NULL; 
        $direction = NULL;
        if( array_key_exists('columnsort', $this->input) && $this->input['columnsort'])
        {
            $column_id = $this->input['columnsort']['column_id'];
            $direction = $this->input['columnsort']['direction'];

            if($direction == 'asc')
            {
                $rows = collect($rows)->sortBy($column_id)->values();
            }
            else
            {
                $rows = collect($rows)->sortByDesc($column_id)->values();
            }
        }  
        else
        {
            $rows = collect($rows)->sortBy('order_no')->values();
        }      
            
        $this->payload = [
            'rows' => $rows,        
        ];
    }

} 