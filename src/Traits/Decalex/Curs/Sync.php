<?php

namespace B2B\Traits\Decalex\Curs;

use B2B\Performers\Decalex\Curs\DoSync;
use B2B\Performers\Decalex\Curs\SaveSync;

trait Sync {

    public static function doSync($input) {
        return (new DoSync($input))
            ->SetSuccessMessage('Preluare cursuri efectuată cu succes!')
            ->Perform();
    }
    
    public static function saveSync($input) {
        return (new SaveSync($input))
            ->SetSuccessMessage('Salvarea cursurilor efectuată cu succes!')
            ->Perform();
    }

    public static function processKCurs($kcurs) {
        $curs = self::where('k_id', $kcurs['id'])->first();

        $input = [
            'name' => $kcurs['title'],
            'descriere' => $kcurs['description'],
            'type' => 'knolyx',
            'k_id' => $kcurs['id'],
            'k_level' => $kcurs['level'],
            'k_duration' => $kcurs['duration'],
            'k_number_students_enrolled' => $kcurs['numberOfStudentsEnrolled'],
            'k_from_training_tracker' => $kcurs['fromTrainingTracker'],
            'k_avatar' => $kcurs['avatar'],
            'created_by' => \Sentinel::check()->id,
            'updated_by' => \Sentinel::check()->id,
        ];

        if(! $curs )
        {
            $curs = self::create($input);
        }
        else
        {
            $curs->update($input);
        }
        
    }
}