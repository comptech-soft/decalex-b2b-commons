<?php

namespace Cartalyst\Performers\Permission;

use Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\Permission;

class DeleteChildren extends Perform {

    public function Action() {
        
        // dd($this->input);

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