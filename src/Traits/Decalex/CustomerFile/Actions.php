<?php

namespace B2B\Traits\Decalex\CustomerFile;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Performers\Decalex\CustomerFile\ChangeStatus;
use B2B\Performers\Decalex\CustomerFile\ChangeFilesStatus;
use B2B\Performers\Decalex\CustomerFile\DeleteFiles;
use B2B\Performers\Decalex\CustomerFile\AttachRegisterFiles;

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
        return (new ChangeStatus($input))
            ->SetSuccessMessage('Schimbare status cu success!')
            ->Perform();
    }  

    public static function changeFilesStatus($input) {
        return (new ChangeFilesStatus($input))
            ->SetSuccessMessage('Schimbare status cu success!')
            ->Perform();
    } 

    public static function deleteFiles($input) {
        return (new DeleteFiles($input))
            ->SetSuccessMessage('Ștergerea fișierelor a fost realizată cu success!')
            ->Perform();
    }  

    public static function attachRegisterFiles($input) {
        return (new AttachRegisterFiles($input))
            ->SetSuccessMessage('Operație cu success!')
            ->Perform();

    }  
    
}

