<?php

namespace Cartalyst\Performers\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class AttachAvatar extends Perform {

    public function Action() {

        $user = \Cartalyst\Models\User::find($this->input['id']);



        $file = $this->input['avatar'];

        if($file)
        {
            $image = \Image::make($file);

            // S3 Amazon
            $filename = md5(time()) . '-' . \Str::slug(str_replace($file->extension(), '', $file->getClientOriginalName())) . '.' .  strtolower($file->extension());
            $result = $file->storeAs('user-avatars/' . $user->id, $filename, 's3');

            $user->avatar = [
                'file_original_name' => $file->getClientOriginalName(),
                'file_original_extension' => $file->extension(),
                'file_full_name' => $filename,
                'file_mime_type' => $file->getMimeType(),
                'file_upload_ip' => request()->ip(),
                'url' => config('filesystems.disks.s3.url') . $result,
                'file_size' => $image->filesize(),
                'file_width' => $image->width(),
                'file_height' => $image->height(),
            ];
        }
        else
        {
            $user->avatar = NULL;
        }

        $user->save();

        $this->payload['user'] = $user;
    }
} 