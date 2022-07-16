<?php

namespace Decalex\Performers\UserSetting;

use Comptech\Helpers\Perform;
use Decalex\Models\UserSetting;

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
        return $record;
    }

} 