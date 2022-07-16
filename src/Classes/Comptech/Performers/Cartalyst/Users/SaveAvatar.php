<?php

namespace Comptech\Performers\Cartalyst\Users;

use Comptech\Helpers\Perform;
use Comptech\Models\System\Upload;
use Comptech\Models\System\Preference;
use Comptech\Models\Cartalyst\Preference as UserPreference;

/**
 * Salveaza avatarul pentru userul curent
 */
class SaveAvatar extends Perform {

    public function Action() {
        
        $preference = Preference::getBySlug('avatar');
        $user = \Sentinel::check();

        $user_preference = UserPreference::getByUserAndPreference($user->id, $preference->id);

        if($this->input['avatar'])
        {
            $upload = Upload::doAction('insert', [
                'file' => $file = $this->input['avatar'],
                'is_image' => 1,
            ]);
        }
        else
        {
            $upload = NULL;
        }

        if(! $upload || $upload['success'])
        {
            if($user_preference)
            {
                $user_preference->update([
                    'value' => $upload ? $upload['payload']['record']->id : NULL,
                    'updated_by' => \Sentinel::check()->id,
                ]);
            }
            else
            {
                $user_preference = UserPreference::create([
                    'user_id' => $user->id,
                    'preference_id' => $preference->id,
                    'value' => $upload ? $upload['payload']['record']->id : NULL,
                    'created_by' => \Sentinel::check()->id,
                ]);
            }
        }

        return $user_preference;
        
    }
} 