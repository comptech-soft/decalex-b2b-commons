<table>
    <thead>
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Nr<br/>Crt', 'rowspan' => 2])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Serviciu', 'colspan' => 5])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Client', 'rowspan' => 2])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Comanda', 'colspan' => 2])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Contract', 'colspan' => 4])
            
        </tr>

        <tr>
           
           

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Denumire'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tip abonament'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tarif (EURO)'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tarif ore<br/>suplimentare (EURO)'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr ore<br/>incluse'])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data'])

            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data semnării'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data expirării'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Status'])
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
            
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['service']['name']])
            
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['tip_abonament']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['tarif'], 'align' => 'right'])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['tarif_ore_suplimentare'], 'align' => 'right'])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['ore_incluse_abonament'], 'align' => 'right'])

            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['customer']['name']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['number']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['date']])

            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['contract']['number']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['contract']['date_from']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['contract']['date_to']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['order']['contract']['status']])
        </tr>
        @endforeach
    </tbody>
</table>