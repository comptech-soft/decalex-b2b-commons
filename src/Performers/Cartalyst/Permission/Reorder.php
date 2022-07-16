<?php

namespace Cartalyst\Performers\Permission;

use Comptech\Helpers\Perform;
use Cartalyst\Models\Permission;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            Permission::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 