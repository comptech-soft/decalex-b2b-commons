<?php

namespace Decalex\Traits\EmailTemplate;

use Comptech\Performers\Datatable\GetItems;

trait GetEmailTemplates {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}