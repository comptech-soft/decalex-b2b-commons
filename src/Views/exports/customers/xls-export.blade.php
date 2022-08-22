<table>
    <thead>
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Nr<br/>Crt'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Denumire'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'CUI'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Status'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Email'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Telefon'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Localitate'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Judet'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Tara'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Strada'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Numar'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Cod postal'])
        </tr>

        
    </thead>

    <tbody>
    @foreach($records as $i => $record)
        <tr>
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => htmlentities($record['name'])])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['vat']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['status']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['email']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['phone']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['city'] ? $record['city']['name'] : '-'])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['city'] ? $record['city']['region']['name'] : '-'])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['city'] ? $record['city']['region']['country']['name'] : '-'])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['street']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['street_number']])
        @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['postal_code']])
        </tr>
    @endforeach
    </tbody>
</table>