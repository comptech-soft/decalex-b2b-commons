<?php

namespace Decalex\Performers\Registru;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {

    public function Action() {

        $registru = \B2B\Models\Decalex\Registru::where('id', $this->input['register_id'])->first();
        
        $header = \B2B\Models\Decalex\RegisterColumn::getHeaderByRegister($this->input['register_id']);
        $columns = \B2B\Models\Decalex\RegisterColumn::getColumnsFromHeader($header);

        $importer = new \Decalex\Imports\RegistruImport($header, $columns, $registru);

        \Excel::import($importer, $this->input['file']);

        $customerRegister = \B2B\Models\Decalex\CustomerRegister::create([
            ...$importer->antet,
            'customer_id' => $this->input['customer_id'],
            'register_id' => $this->input['register_id'],
            'status' => 'protected',
            'created_by' => \Sentinel::check()->id,
            
        ]);

        foreach($importer->lines as $i => $line)
        {

            $departament = NULL;
            if(array_key_exists('departament', $line))
            {
                $departament = \B2B\Models\Decalex\CustomerDepartament::getOrCreate($line['departament'], $this->input['customer_id']);
            }

            $row = \B2B\Models\Decalex\CustomerRegisterRow::create([
                'customer_register_id' => $customerRegister->id,
                'customer_id' => $this->input['customer_id'],
                'register_id' => $this->input['register_id'],
                'order_no' => 1 + $i,
                'deleted' => 0,
                'status' => 'protected',
                'departament_id' => $departament ? $departament->id : NULL,
                'created_by' => \Sentinel::check()->id,
            ]);

            foreach($line as $key => $value)
            {
                if($key[0] == '#')
                {
                    /**
                     * Daca nu-i # ==> nu-i coloana definita
                     */
                    \B2B\Models\Decalex\CustomerRegisterRowValue::create([
                        'row_id' => $row->id,
                        'column_id' => substr($key, 1),
                        'deleted' => 0,
                        'value' => $value,
                        'created_by' => \Sentinel::check()->id,
                    ]);
                }
            }

        }
        
        $this->payload['currentCustomerRegister'] =  $customerRegister;
    }

} 