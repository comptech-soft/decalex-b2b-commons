<?php

namespace Decalex\Performers\RegisterRow;

use Comptech\Helpers\Perform;

class DeleteAll extends Perform {

    public function Action() {
    
        \Decalex\Models\RegisterRowValue::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        \Decalex\Models\RegisterRow::where('customer_id', $this->input['customer_id'])->where('register_id', $this->input['register_id'])->delete();
        
    }

} 