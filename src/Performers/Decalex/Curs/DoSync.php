<?php

namespace B2B\Performers\Decalex\Curs;

use B2B\Classes\Comptech\Helpers\Perform;

class DoSync extends Perform {

    public function Action() {
        
        $response =  \Http::withHeaders([
            'X-Project-Id' => config('knolyx.project_id'),
            'X-Api-Key' => config('knolyx.app_key')
        ])->get(config('knolyx.endpoint') . 'course?pagination.page=0&pagination.size=20');

        $this->payload['cursuri'] = $response->json(); 
    }

} 