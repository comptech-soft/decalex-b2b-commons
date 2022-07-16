<?php

namespace Decalex\Traits\Curs;

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
            'name' => 'required',
            'url' => '',
            'category_id' => 'required|exists:categories,id',
        ];
        return $result;
    }

    public static function ProcessFile($curs, $file) {
        $ext = strtolower($file->extension());
        if(in_array($ext, ['pdf']))
        {

            $filename = md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
            
            $result = $file->storeAs('cursuri-documents/' . $curs->id, $filename, 's3');

            $inputdata = [
                'file_original_name' => $file->getClientOriginalName(),
                'file_original_extension' => $file->extension(),
                'file_full_name' => $filename,
                'file_mime_type' => $file->getMimeType(),
                'file_upload_ip' => request()->ip(),
                'file_size' => $file->getSize(),
                'url' => $url = config('filesystems.disks.s3.url') . $result,
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

            $curs->file = $inputdata;

            $curs->url = $url;

            $curs->save();
        }
    }

    public static function doInsert($input, $curs) {

        $curs = self::create( collect($input)->except(['file'])->toArray() );

        self::ProcessFile($curs, $input['file']);

        return $curs;
    }

    // public static function doDuplicate($input, $centralizator) {
    //     return self::doInsert($input, null);
    // }

    // public static function doUpdate($input, $centralizator) {
    //     $collectionInput = collect($input);

    //     $centralizator->update($collectionInput->except(['columns'])->toArray());

    //     if(array_key_exists('columns', $input))
    //     {
    //         $centralizator->attachColumns($collectionInput->only(['columns'])->toArray()['columns']);
    //     }

    //     return $centralizator;
    // }

    // public static function doDelete($input, $centralizator) {
        
    //     $centralizator->deleted = 1;
    //     $centralizator->updated_by = \Sentinel::check()->id;
    //     $centralizator->save();
    //     return $centralizator;
    // }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}