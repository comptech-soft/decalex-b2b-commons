<?php

namespace B2B\Performers\Cartalyst\Permission;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\Permission;

class DeleteChildren extends Perform {

    public function Action() {
        
        if( ! $this->input['id'] )
        {
            foreach(Permission::all() as $i => $record)
            {
                $record->delete();
            }
        }
        else
        {
            $record = Permission::find($this->input['id']);
            $record->delete();
        }
    }

} 