<?php

namespace B2B\Performers\Cartalyst\Permission;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\Permission;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            Permission::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 