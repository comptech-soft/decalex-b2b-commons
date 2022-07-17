<?php

namespace Decalex\Performers\Registru;

use Comptech\Helpers\Perform;

class CopyToCustomer extends Perform {

    public function Action() {

        $sursa = \B2B\Models\Decalex\CustomerRegister::where('id', $this->input['customer_register_id'])->with(['rows'])->first();


        $dest = \B2B\Models\Decalex\CustomerRegister::create([
            ...$this->input,
            'props' => $sursa->props,
            'created_by' => \Sentinel::check()->id,
        ]);

        foreach($sursa->rows as $i => $row)
        {
            if($row->deleted == 0)
            {
                $newrow = \B2B\Models\Decalex\CustomerRegisterRow::create([
                    'customer_register_id' => $dest->id,
                    'customer_id' => $this->input['customer_id'],
                    'register_id' => $this->input['register_id'],
                    'departament_id' => NULL,
                    'order_no' => $row->order_no,
                    'deleted' => $row->deleted,
                    'status' => $row->status,
                    'props' => $row->status,
                    'values' => $row->status,
                    'created_by' => \Sentinel::check()->id,
                ]);

                $values = \B2B\Models\Decalex\CustomerRegisterRowValue::where('row_id', $row->id)->get();

                foreach($values as $i => $record)
                {
                    \B2B\Models\Decalex\CustomerRegisterRowValue::create([
                        'row_id' => $newrow->id,
                        'column_id' => $record->column_id,
                        'deleted' => $record->deleted,
                        'value' => $record->value,
                        'created_by' => \Sentinel::check()->id,
                    ]);
                }
            }
        }
    }

} 