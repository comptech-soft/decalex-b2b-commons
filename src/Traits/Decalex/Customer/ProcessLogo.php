<?php

namespace B2B\Traits\Decalex\Customer;

trait ProcessLogo {

    public function dettachLogo() {
        $this->logo = NULL;
        $this->save();
    }

    public function attachLogo($file) {
        if(! \Storage::exists('public/images/uploaded') )
        {
            \Storage::disk('public')->makeDirectory('images/uploaded', 0777);
        }
        
        $filename = storage_path('app/public') . '/images/uploaded/' . md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
        
        $filename = str_replace('\\', '/', $filename);

        $image = \Image::make($file);
        $image->save($filename);
    
        $this->logo = [
            'file_original_name' => $file->getClientOriginalName(),
            'file_original_extension' => $file->extension(),
            'file_full_name' => $filename,
            'file_mime_type' => $file->getMimeType(),
            'file_upload_ip' => request()->ip(),
            'url' => $value = asset( str_replace( str_replace('\\', '/', storage_path('app/public')), 'storage', $filename) ),
            'file_size' => $image->filesize(),
            'file_width' => $image->width(),
            'file_height' => $image->height(),
        ];

        $this->save();
    }

    public function processLogo($input) {
        if(array_key_exists('logo', $input) && $input['logo'])
        {
            if(! is_string($input['logo']) )
            {
                $this->attachLogo($input['logo']);
            }
        }
        else
        {
            $this->dettachLogo();
        }
    } 
}