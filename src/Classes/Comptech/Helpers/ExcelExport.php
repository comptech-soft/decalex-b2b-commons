<?php

namespace B2B\Classes\Comptech\Helpers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Contracts\View\View;

class ExcelExport implements FromView, WithStrictNullComparison, ShouldAutoSize {

    public $view = NULL;
    public $records = [];
    public $columns = [];

    public function __construct($view, $records, $columns) {
        $this->view = $view;
        $this->records = $records;
        $this->columns = $columns;
    }

    public function view(): View {
        return view($this->view, [
            'records' => $this->records,
            'columns' => $this->columns,
        ]);
    }

}