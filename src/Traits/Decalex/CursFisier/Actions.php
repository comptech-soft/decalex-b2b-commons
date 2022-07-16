<?php

namespace Decalex\Traits\CursFisier;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
            'name.required' => 'Denumirea cursului trebuie completată.',
            'category_id.required' => 'Categoria trebuie selectată.',
            'url.required' => 'Linkul trebuie completat.',
            'url.url' => 'Linkul nu pare sa fie valid.',
        ];
    }

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'curs_id' => 'required|exists:educatie,id',
        ];
        return $result;
    }

    public static function ProcessFile($file, $input) {
        $ext = strtolower($file->extension());
        if(in_array($ext, ['jpg', 'jpeg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'pdf', 'txt', 'rar', 'zip']))
        {
            $filename = md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
            $result = $file->storeAs('cursuri-documents/' . $input['curs_id'], $filename, 's3');

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
            foreach($input['file'] as $i => $file)
            {
                $name = $input['name'] . '-' . $i;
                self::ProcessFile($file, [...$input, 'name' => $name]);
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

}