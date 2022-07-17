<?php

namespace Decalex\Rules\Notification;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Decalex\Notification;

class UniqueNotification implements Rule {

    public $input = NULL;
    public $notification = NULL;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function passes($attribute, $value)
    {   
        $q = Notification::where('entity', $this->input['entity'])->where('action', $this->input['action']);

        if(array_key_exists('id', $this->input) && $this->input['id'])
        {
            $q->where('id', '<>', $this->input['id']);
        }

        $this->notification = $q->first();

        if($this->notification)
        {
            return FALSE;
        }
        
        return TRUE;
    }

    public function message()
    {
        return 'Notificarea #' . $this->input['entity'] . ' - ' . $this->input['action'] . ' este deja definită.';
    }
}
