<?php

namespace B2B\Performers\Decalex\Chestionar;

use Comptech\Helpers\Perform;
use B2B\Models\Decalex\Intrebare;

class SearchIntrebare extends Perform {

    public function Action() {

        $wheres = [
            "parent_id IS NULL"
        ];

        if($this->input['searchtype'] == 'id')
        {
            $wheres[] = "id LIKE '%" . $this->input['values']['id'] . "%'";
        }
        else
        {
            if($this->input['searchtype'] == 'question')
            {
                $wheres[] = "question LIKE '%" . $this->input['values']['question'] . "%'";
            }
        }

        if( is_array($tipuri = $this->input['values']['tip_intrebare']) && count($tipuri) )
        {
            $wheres[] = "tip_intrebare IN (" . implode(',', $tipuri) . ")";
        }

        $whereRaw = collect($wheres)->map(function($item) {return '(' . $item . ')';})->implode(' AND ');

        $questions = Intrebare::whereRaw($whereRaw)->orderBy('id')->get();
        
        $this->payload['questions'] = $questions;
        $this->payload['whereRaw'] = $whereRaw;
        
    }

} 