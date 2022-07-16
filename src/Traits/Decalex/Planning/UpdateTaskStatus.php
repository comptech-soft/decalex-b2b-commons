<?php

namespace Decalex\Traits\Planning;

trait UpdateTaskStatus {

    public static function updateTaskStatus($input) {
        return (new \Decalex\Performers\Planning\UpdateTaskStatus($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}