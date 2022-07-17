<?php

namespace B2B\Traits\Decalex\TipIntrebare;

use B2B\Performers\Decalex\TipIntrebare\Reorder as ReorderTipuri;

trait Reorder {

    public static function reorderRecords($input) {
        return (new ReorderTipuri($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}