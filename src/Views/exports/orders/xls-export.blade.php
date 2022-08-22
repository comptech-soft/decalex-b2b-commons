<table>
    <thead>
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Nr<br/>Crt', 'rowspan' => 2])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Comanda', 'colspan' => 3])
            
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Contract', 'colspan' => 4])
            
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Servicii', 'colspan' => 5])
        </tr>

        <tr>
           
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Client'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data'])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data semnării'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data expirării'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Status'])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Denumire'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tip abonament'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tarif (EURO)'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tarif ore<br/>suplimentare (EURO)'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr ore<br/>incluse'])
        </tr>

        
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        
            @if(count($record['services']) == 0)
            <tr>
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['number']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['customer']['name']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['date']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['number']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['date_from']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['date_to']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['status']])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
            </tr>
            @else
                @foreach($record['services'] as $j => $service)
                    <tr>
                    @if($j == 0)
                    
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['number']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['customer']['name']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['date']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['number']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['date_from']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['date_to']])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['contract']['status']])
                    @else
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => '&nbsp;'])
                    
                    @endif

                    @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $service['service']['name']])
                    @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $service['tip_abonament']])
                    @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $service['tarif'], 'align' => 'right'])
                    @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $service['tarif_ore_suplimentare'], 'align' => 'right'])
                    @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $service['ore_incluse_abonament'], 'align' => 'right'])
                    </tr>
                @endforeach
            @endif
        
        @endforeach
    </tbody>
</table>