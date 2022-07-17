<?php

namespace B2B\Performers\Decalex\CustomerFile;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\CustomerFolder;

class GetRegisterRowFiles extends Perform {

    public function Action() {

        $folder = CustomerFolder::where('name', $this->input['folderName'])
            ->where('platform', 'admin')
            ->where('customer_id', $this->input['customer_id'])
            ->first();

        if(! $folder)
        {
            $folder = new CustomerFolder([
                'name' => $this->input['folderName'],
                'platform' => 'admin',
                'customer_id' => $this->input['customer_id'],
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);

            $folder->save();
        }

        $records = CustomerFile::getItems([
            'per_page' => -1,
            'wheres' => [
                "(customer_id = " . $this->input['customer_id'] . ")",
                "(folder_id = " . $folder->id . ")"
            ],
        ])['payload']['paginator']->toArray()['data'];

        $records = collect($records)->filter(function($item){
            return $item['props']['row_id'] == $this->input['row_id'];
        });

        $this->payload['files'] = $records;
    }

}