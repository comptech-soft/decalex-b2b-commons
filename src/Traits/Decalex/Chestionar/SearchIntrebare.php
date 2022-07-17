<?php

namespace B2B\Traits\Decalex\Chestionar;

trait SearchIntrebare {

    public static function searchIntrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\SearchIntrebare($input))
            ->SetSuccessMessage('Încarcare întrebări cu success!')
            ->Perform();
    }

}