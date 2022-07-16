<?php

namespace Decalex\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ChestionarImport implements ToCollection {

    
    public $chestionar_id = NULL;

    /** se produce ca rezultat lista intrebarilor */
    public $questions = [];

    /** indexul curent in fisier */
    public $index = 0;

    /** randurile din fisier */
    public $rows = NULL;

    public function __construct($chestionar_id) {
        $this->chestionar_id = $chestionar_id;
    }

    protected function prepareRows() {

        $currentQuestion = NULL;
        foreach($this->rows as $i => $row)
        {
            if($i > 0)
            {
                $rowType = '';
                if(is_integer($row[0]) )
                {
                    $rowType = 'Q';
                    $currentQuestion = $row[0];
                }
                else
                {
                    if( $row[1] )
                    {
                        $rowType = 'S';
                    }
                    else
                    {
                        $rowType = 'A';
                    }
                }
                $row['type'] = $rowType;
                $row['question'] = $currentQuestion;
                $row['empty'] = is_null($row[0]) && 
                                is_null($row[1]) && 
                                is_null($row[2]) &&
                                is_null($row[3]) &&
                                is_null($row[4]) &&
                                is_null($row[5]);
            }
        }
    }


    protected function MakeQuestion($i, $order_no) {
        // echo 'MakeQuestion(' . $i . '.' . $order_no . ')<br/>';

        $question = [
            'order_no' => $order_no,
            'row_no' => $i,
            'question_type' => $this->rows[$i][1],
            'question' => $this->rows[$i][2],
            'raspunsuri' => [],
            'subintrebare' => NULL,
        ];

        if($i + 1 < $this->rows->count())
        {
            $j = $i + 1;
            $next = $this->rows[$j];
            if($next['type'] == 'A')
            {
                $hasSubintrebare = false;
                while( ($j < $this->rows->count()) && ($this->rows[$j]['type'] == 'A') && ! $this->rows[$j]['empty'])
                {   
                    $question['raspunsuri'][] = [
                        'answer' => $this->rows[$j][3],
                        'value' => $this->rows[$j][4],
                        'active' => $this->rows[$j][5] == '*',
                    ];
                    if($this->rows[$j][5] == '*')
                    {
                        $hasSubintrebare = true;
                    }
                    $j++;
                }
                if( ($j < $this->rows->count()) && ! $this->rows[$j]['empty'] )
                {
                    if($hasSubintrebare && ($this->rows[$j]['type'] == 'S'))
                    {
                        $question['subintrebare'] = $this->MakeQuestion($j, NULL);
                    }
                }
            }
            
        }

        return $question;
    }

    protected function CreateQuestions($i) {
        if($i < $this->rows->count() && ! $this->rows[$i]['empty'])
        {
            if($this->rows[$i]['type'] == 'Q')
            {
                $this->questions[$this->rows[$i][0]] = $this->MakeQuestion($i, $this->rows[$i][0]);
            }
            $this->CreateQuestions($i + 1);
        }
    }

    public function collection(Collection $rows) {
        
        $this->index = 1;
        $this->rows = $rows;

        $this->prepareRows();

        $this->CreateQuestions(1);
    }

    

}