<?php

namespace B2B\Performers\Decalex\RegisterRow;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\RegisterRowValue;
use B2B\Models\Decalex\RegisterRow;

class DeleteAll extends Perform {

    public function Action() {
    
        RegisterRowValue::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        
        RegisterRow::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        
    }

} 