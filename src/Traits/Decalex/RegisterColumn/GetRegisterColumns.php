<?php

namespace B2B\Traits\Decalex\RegisterColumn;

use Comptech\Performers\Datatable\GetItems;

trait GetRegisterColumns {

    /**  Get items */
    public static function getQuery() {
        return 
            self::query()
            ->where('registers-columns.deleted', 0)
            ->leftJoin(
                'registers',
                function($j) {
                    $j->on('registers.id', '=', 'registers-columns.register_id');
                }
            )
            ->select('registers-columns.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['parentgroup']), __CLASS__))->Perform();
    }

    /** Genereaza subcoloanele unei coloane */
    public static function MakeSubColumns($columns, $column) {
        $r = [];
        foreach($columns as $i => $col)
        {
            if($col['group_id'] == $column['id'])
            {
                $col['order_no'] = $column['order_no'] + $col['order_no'];
                $r[] = $col;
            }
        }
        return collect($r)->sortBy('order_no')->toArray();
    }

    /** Genereaza headerul unui registru */
    public static function getHeaderByRegister($register_id) {

        $columns = self::where('register_id', $register_id)->get()->toArray();

        $header = [];

        foreach($columns as $i => $column)
        {
            if($column['is_group'] == 1 || (! $column['is_group'] && ! $column['group_id']) )
            {
                $column['order_no'] = 1000 * $column['order_no'];

                $column['subcolumns'] = [];

                if($column['is_group'])
                {
                    $column['subcolumns'] = self::MakeSubColumns( $columns, $column );
                }

                $header[] = $column;
            }
        }

        return collect($header)->sortBy('order_no')->toArray();
    }

    public static function getColumnsFromHeader($header) {
        $r = [];

        foreach($header as $i => $h)
        {
            if( count($h['subcolumns']) == 0 )
            {
                $r['#' . $h['id']] = NULL;
            }
            else
            {
                foreach($h['subcolumns'] as $j => $s)
                {
                    $r['#' . $s['id']] = NULL;
                }
            }
        }

        return $r;
    }
}