<?php

namespace B2B\Performers\Decalex\Curs;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\Curs;

class GetSummary extends Perform {

    public function Action() {
        
        $uncategorized_count = Curs::whereNull('category_id')->count();

        $this->payload = [
            'uncategorized_count' => $uncategorized_count,
        ];
    }

} 