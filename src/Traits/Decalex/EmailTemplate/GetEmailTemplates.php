<?php

namespace B2B\Traits\Decalex\EmailTemplate;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetEmailTemplates {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}