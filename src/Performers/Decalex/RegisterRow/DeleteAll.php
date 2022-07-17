<?php

namespace B2B\Performers\Decalex\RegisterRow;

use Comptech\Helpers\Perform;

class DeleteAll extends Perform {

    public function Action() {
    
        \B2B\Models\Decalex\RegisterRowValue::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        \B2B\Models\Decalex\RegisterRow::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        
    }

} 