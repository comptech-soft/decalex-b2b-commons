<?php

namespace Decalex\Traits\TipIntrebare;

trait Reorder {

    public static function reorderRecords($input) {
        return (new \Decalex\Performers\TipIntrebare\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}