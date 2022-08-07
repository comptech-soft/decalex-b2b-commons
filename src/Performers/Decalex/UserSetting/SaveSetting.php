<?php

namespace B2B\Performers\Decalex\UserSetting;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\UserSetting;

class SaveSetting extends Perform {

    public function Action() {
        $record = UserSetting::getByUserAndCode($this->input['user_id'], $this->input['code']);

        if(! $record)
        {
            $record = UserSetting::create($this->input);
        }
        else
        {
            $record->update([
                'value' => $this->input['value'],
            ]);
        }
        
    }

} 