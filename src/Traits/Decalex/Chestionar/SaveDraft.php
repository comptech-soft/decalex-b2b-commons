<?php

namespace Decalex\Traits\Chestionar;

trait SaveDraft {

    public static function saveDraft($input) {

        $rules = [
            'name' => 'required',
            'category_id' => 'required',
        ]; 
        
        $messages = [
            'name.required' => 'Denumirea chestionarului trebuie completată',
            'category_id.required' => 'Selectați categoria chestionarului',
        ];

        return (new \Decalex\Performers\Chestionar\SaveDraft($input, $rules, $messages))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}