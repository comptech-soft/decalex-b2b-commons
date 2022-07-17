<?php

namespace B2B\Traits\Decalex\Chestionar;

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

        return (new \B2B\Performers\Decalex\Chestionar\SaveDraft($input, $rules, $messages))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}