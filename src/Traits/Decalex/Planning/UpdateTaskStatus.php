<?php

namespace B2B\Traits\Decalex\Planning;

trait UpdateTaskStatus {

    public static function updateTaskStatus($input) {
        return (new \B2B\Performers\Decalex\Planning\UpdateTaskStatus($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}