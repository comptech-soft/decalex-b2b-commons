<table>
    <thead>
        <tr>
            @include('exports.~pieces.th', ['caption' => 'Nr<br/>Crt', 'rowspan' => 2])

            @include('exports.~pieces.th', ['caption' => 'Serviciu', 'colspan' => 5])

            @include('exports.~pieces.th', ['caption' => 'Client', 'rowspan' => 2])

            @include('exports.~pieces.th', ['caption' => 'Comanda', 'colspan' => 2])

            @include('exports.~pieces.th', ['caption' => 'Contract', 'colspan' => 4])
            
        </tr>

        <tr>
           
           

            @include('exports.~pieces.th', ['caption' => 'Denumire'])
            @include('exports.~pieces.th', ['caption' => 'Tip abonament'])
            @include('exports.~pieces.th', ['caption' => 'Tarif (EURO)'])
            @include('exports.~pieces.th', ['caption' => 'Tarif ore<br/>suplimentare (EURO)'])
            @include('exports.~pieces.th', ['caption' => 'Număr ore<br/>incluse'])

            @include('exports.~pieces.th', ['caption' => 'Număr'])
            @include('exports.~pieces.th', ['caption' => 'Data'])

            @include('exports.~pieces.th', ['caption' => 'Număr'])
            @include('exports.~pieces.th', ['caption' => 'Data semnării'])
            @include('exports.~pieces.th', ['caption' => 'Data expirării'])
            @include('exports.~pieces.th', ['caption' => 'Status'])
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        <tr>
            @include('exports.~pieces.td', ['caption' => $i + 1])
            
            @include('exports.~pieces.td', ['caption' => $record['service']['name']])
            
            @include('exports.~pieces.td', ['caption' => $record['tip_abonament']])
            @include('exports.~pieces.td', ['caption' => $record['tarif'], 'align' => 'right'])
            @include('exports.~pieces.td', ['caption' => $record['tarif_ore_suplimentare'], 'align' => 'right'])
            @include('exports.~pieces.td', ['caption' => $record['ore_incluse_abonament'], 'align' => 'right'])

            @include('exports.~pieces.td', ['caption' => $record['order']['customer']['name']])
            @include('exports.~pieces.td', ['caption' => $record['order']['number']])
            @include('exports.~pieces.td', ['caption' => $record['order']['date']])

            @include('exports.~pieces.td', ['caption' => $record['order']['contract']['number']])
            @include('exports.~pieces.td', ['caption' => $record['order']['contract']['date_from']])
            @include('exports.~pieces.td', ['caption' => $record['order']['contract']['date_to']])
            @include('exports.~pieces.td', ['caption' => $record['order']['contract']['status']])
        </tr>
        @endforeach
    </tbody>
</table>