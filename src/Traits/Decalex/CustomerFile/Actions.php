<?php

namespace B2B\Traits\Decalex\CustomerFile;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'customer_id' => 'required|exists:customers,id',
        ];
        return $result;
    }

    public static function ProcessFile($file, $input) {
        $ext = strtolower($file->extension());
        if(in_array($ext, ['jpg', 'jpeg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'pdf', 'txt', 'rar', 'zip']))
        {
            $filename = md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
            $result = $file->storeAs('customers-documents/' . $input['customer_id'], $filename, 's3');

            $inputdata = [
                ...$input,
                'file_original_name' => $file->getClientOriginalName(),
                'file_original_extension' => $file->extension(),
                'file_full_name' => $filename,
                'file_mime_type' => $file->getMimeType(),
                'file_upload_ip' => request()->ip(),
                'file_size' => $file->getSize(),
                'url' => config('filesystems.disks.s3.url') . $result,
                'created_by' => \Sentinel::check()->id,
            ];

            if(in_array($ext, ['jpg', 'jpeg', 'png']))
            {
                $image = \Image::make($file);
                $inputdata = [
                    ...$inputdata,
                    'file_size' => $image->filesize(),
                    'file_width' => $image->width(),
                    'file_height' => $image->height(),
                ];
            }

            $record = self::create($inputdata);
        }
    }

    public static function doInsert($input, $record) {
        if( $input['file'] && is_array($input['file']) )
        {
            foreach($input['file'] as $file)
            {
                self::ProcessFile($file, $input);
            }
        }
        else
        {
            if($input['file'])
            {
                self::ProcessFile($input['file'], $input);
            }
        }
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function changeStatus($input) {
        return (new \Decalex\Performers\CustomerFile\ChangeStatus($input))
            ->SetSuccessMessage('Schimbare status cu success!')
            ->Perform();
    }  

    public static function changeFilesStatus($input) {
        return (new \Decalex\Performers\CustomerFile\ChangeFilesStatus($input))
            ->SetSuccessMessage('Schimbare status cu success!')
            ->Perform();
    } 

    public static function attachRegisterFiles($input) {
        return (new \Decalex\Performers\CustomerFile\AttachRegisterFiles($input))
            ->SetSuccessMessage('Operație cu success!')
            ->Perform();

    }  
    
}

