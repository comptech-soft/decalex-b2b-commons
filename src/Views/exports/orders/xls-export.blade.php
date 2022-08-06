<table>
    <thead>
        <tr>
            @include('exports.~pieces.th', ['caption' => 'Nr<br/>Crt', 'rowspan' => 2])

            @include('exports.~pieces.th', ['caption' => 'Comanda', 'colspan' => 3])
            
            @include('exports.~pieces.th', ['caption' => 'Contract', 'colspan' => 4])
            
            @include('exports.~pieces.th', ['caption' => 'Servicii', 'colspan' => 5])
        </tr>

        <tr>
           
            @include('exports.~pieces.th', ['caption' => 'Număr'])
            @include('exports.~pieces.th', ['caption' => 'Client'])
            @include('exports.~pieces.th', ['caption' => 'Data'])

            @include('exports.~pieces.th', ['caption' => 'Număr'])
            @include('exports.~pieces.th', ['caption' => 'Data semnării'])
            @include('exports.~pieces.th', ['caption' => 'Data expirării'])
            @include('exports.~pieces.th', ['caption' => 'Status'])

            @include('exports.~pieces.th', ['caption' => 'Denumire'])
            @include('exports.~pieces.th', ['caption' => 'Tip abonament'])
            @include('exports.~pieces.th', ['caption' => 'Tarif (EURO)'])
            @include('exports.~pieces.th', ['caption' => 'Tarif ore<br/>suplimentare (EURO)'])
            @include('exports.~pieces.th', ['caption' => 'Număr ore<br/>incluse'])
        </tr>

        
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        
            @if(count($record['services']) == 0)
            <tr>
                @include('exports.~pieces.td', ['caption' => $i + 1])
                @include('exports.~pieces.td', ['caption' => $record['number']])
                @include('exports.~pieces.td', ['caption' => $record['customer']['name']])
                @include('exports.~pieces.td', ['caption' => $record['date']])
                @include('exports.~pieces.td', ['caption' => $record['contract']['number']])
                @include('exports.~pieces.td', ['caption' => $record['contract']['date_from']])
                @include('exports.~pieces.td', ['caption' => $record['contract']['date_to']])
                @include('exports.~pieces.td', ['caption' => $record['contract']['status']])
                @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('exports.~pieces.td', ['caption' => '&nbsp;'])
            </tr>
            @else
                @foreach($record['services'] as $j => $service)
                    <tr>
                    @if($j == 0)
                    
                        @include('exports.~pieces.td', ['caption' => $i + 1])
                        @include('exports.~pieces.td', ['caption' => $record['number']])
                        @include('exports.~pieces.td', ['caption' => $record['customer']['name']])
                        @include('exports.~pieces.td', ['caption' => $record['date']])
                        @include('exports.~pieces.td', ['caption' => $record['contract']['number']])
                        @include('exports.~pieces.td', ['caption' => $record['contract']['date_from']])
                        @include('exports.~pieces.td', ['caption' => $record['contract']['date_to']])
                        @include('exports.~pieces.td', ['caption' => $record['contract']['status']])
                    @else
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('exports.~pieces.td', ['caption' => '&nbsp;'])
                    
                    @endif

                    @include('exports.~pieces.td', ['caption' => $service['service']['name']])
                    @include('exports.~pieces.td', ['caption' => $service['tip_abonament']])
                    @include('exports.~pieces.td', ['caption' => $service['tarif'], 'align' => 'right'])
                    @include('exports.~pieces.td', ['caption' => $service['tarif_ore_suplimentare'], 'align' => 'right'])
                    @include('exports.~pieces.td', ['caption' => $service['ore_incluse_abonament'], 'align' => 'right'])
                    </tr>
                @endforeach
            @endif
        
        @endforeach
    </tbody>
</table>