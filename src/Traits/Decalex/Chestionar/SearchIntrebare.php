<?php

namespace Decalex\Traits\Chestionar;

trait SearchIntrebare {

    public static function searchIntrebare($input) {
        return (new \Decalex\Performers\Chestionar\SearchIntrebare($input))
            ->SetSuccessMessage('Încarcare întrebări cu success!')
            ->Perform();
    }

}