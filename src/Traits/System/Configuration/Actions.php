<?php

namespace ComptechSoft\Decalex\Traits\System\Configuration;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'code' => 'required|max:64|unique:sys-config,code',
        ];
        if( $action == 'update')
        {
            $result['code'] .= (',' . $input['id']);
        }
        return $result;
    }
    

    public function attachImage($file) {

        if(! \Storage::exists('public/images/uploaded') )
        {
            \Storage::disk('public')->makeDirectory('images/uploaded', 0777);
        }
        
        $filename = storage_path('app/public') . '/images/uploaded/' . md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
        
        $filename = str_replace('\\', '/', $filename);

        $image = \Image::make($file);
        $image->save($filename);
        

        $this->update([
            'file_original_name' => $file->getClientOriginalName(),
            'file_original_extension' => $file->extension(),
            'file_full_name' => $filename,
            'file_mime_type' => $file->getMimeType(),
            'file_upload_ip' => request()->ip(),
            'url' => $value = asset( str_replace( str_replace('\\', '/', storage_path('app/public')), 'storage', $filename) ),
            'value' => $value,
            'file_size' => $image->filesize(),
            'file_width' => $image->width(),
            'file_height' => $image->height(),
            
        ]);
    }

    public static function doInsert($input, $config) {
        $collectInput = collect($input);

        $config = self::create($collectInput->except('file')->toArray());

        if(array_key_exists('file', $input) && $input['file'])
        {
            $config->attachImage($input['file']);
        }

        return $config;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}