<?php

namespace System\Models;

class Validation {

    public static function unique($input) {

        $table = $input['options']['table'];
        $field = $input['options']['field'];

        $value = $input['value'];

        $q = \DB::table($table)->where($field, $value);

        if(array_key_exists('except', $input['options']))
        {
            $except = $input['options']['except'];
            if($except)
            {
                $q->where('id', '<>', $except);
            }
        }
       
        $r = $q->first();

        /** Daca gaseste ==> valid = FALSE */
        return $r ? 0 : 1;
    }

}