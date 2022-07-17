<?php

namespace B2B\Performers\Decalex\Registru;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\Registru;
use B2B\Models\Decalex\RegisterColumn;
use B2B\Imports\RegistruImport;
use B2B\Models\Decalex\CustomerRegister;
use B2B\Models\Decalex\CustomerDepartament;
use B2B\Models\Decalex\CustomerRegisterRow;
use B2B\Models\Decalex\CustomerRegisterRowValue;

class XlsImport extends Perform {

    public function Action() {

        $registru = Registru::where('id', $this->input['register_id'])->first();
        
        $header = RegisterColumn::getHeaderByRegister($this->input['register_id']);
        $columns = RegisterColumn::getColumnsFromHeader($header);

        $importer = new RegistruImport($header, $columns, $registru);

        \Excel::import($importer, $this->input['file']);

        $customerRegister = CustomerRegister::create([
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
                $departament = CustomerDepartament::getOrCreate($line['departament'], $this->input['customer_id']);
            }

            $row = CustomerRegisterRow::create([
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
                    CustomerRegisterRowValue::create([
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