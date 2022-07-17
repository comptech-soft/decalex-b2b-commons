<?php

namespace B2B\Performers\Decalex\CustomerFile;

use Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\CustomerFolder;

class AttachRegisterFiles extends Perform {

    public function Action() {

        // dd($this->input['atasament']['folder']);

        $folder = CustomerFolder::where('name', $this->input['atasament']['folder']['name'])
            ->where('platform', $this->input['atasament']['folder']['platform'])
            ->where('customer_id', $this->input['atasament']['folder']['customer_id'])
            ->first();

        if(! $folder)
        {
            $folder = new CustomerFolder([
                'name' => $this->input['atasament']['folder']['name'],
                'platform' => $this->input['atasament']['folder']['platform'],
                'customer_id' => $this->input['atasament']['folder']['customer_id'],
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);

            $folder->save();
        }

        $input = [
            "id" => null,
            "customer_id" => $this->input['atasament']['folder']['customer_id'],
            "folder_id" => $folder->id,
            "file_original_name" => null,
            "file_original_extension" => null,
            "file_full_name" => null,
            "file_mime_type" => null,
            "file_upload_ip" => null,
            "url" => null,
            "file_size" => null,
            "file_width" => null,
            "file_height" => null,
            "status" => "protected",
            "props" => null,
            "platform" => "admin",
            "name" => NULL,
            "description" => NULL,
            "file" => $this->input['atasament']['file'],
            'created_by' => \Sentinel::check()->id,
            'props' => [
                'row_id' => $this->input['row_id']
            ],
        ];

        CustomerFile::doInsert($input, NULL);
    }

}