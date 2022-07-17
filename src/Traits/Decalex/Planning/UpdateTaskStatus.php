<?php

namespace B2B\Traits\Decalex\Planning;

trait UpdateTaskStatus {

    public static function updateTaskStatus($input) {
        return (new \Decalex\Performers\Planning\UpdateTaskStatus($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}