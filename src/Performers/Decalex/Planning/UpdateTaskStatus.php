<?php

namespace Decalex\Performers\Planning;

use Comptech\Helpers\Perform;

use Decalex\Models\Planning;

class UpdateTaskStatus extends Perform {

    public function Action() {

        $task = Planning::find($this->input['task_id']);

        $task->status = $this->input['status'];
        $task->updated_by = \Sentinel::check()->id;
        
        $task->save();
    }

} 