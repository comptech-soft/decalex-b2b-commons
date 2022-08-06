<table>
    <thead>
        <tr>
            @include('exports.~pieces.th', ['caption' => 'Nr<br/>Crt'])
            @include('exports.~pieces.th', ['caption' => 'Denumire'])
            @include('exports.~pieces.th', ['caption' => 'CUI'])
            @include('exports.~pieces.th', ['caption' => 'Status'])
            @include('exports.~pieces.th', ['caption' => 'Email'])
            @include('exports.~pieces.th', ['caption' => 'Telefon'])
            @include('exports.~pieces.th', ['caption' => 'Localitate'])
            @include('exports.~pieces.th', ['caption' => 'Judet'])
            @include('exports.~pieces.th', ['caption' => 'Tara'])
            @include('exports.~pieces.th', ['caption' => 'Strada'])
            @include('exports.~pieces.th', ['caption' => 'Numar'])
            @include('exports.~pieces.th', ['caption' => 'Cod postal'])
        </tr>

        
    </thead>

    <tbody>
    @foreach($records as $i => $record)
        <tr>
        @include('exports.~pieces.td', ['caption' => $i + 1])
        @include('exports.~pieces.td', ['caption' => htmlentities($record['name'])])
        @include('exports.~pieces.td', ['caption' => $record['vat']])
        @include('exports.~pieces.td', ['caption' => $record['status']])
        @include('exports.~pieces.td', ['caption' => $record['email']])
        @include('exports.~pieces.td', ['caption' => $record['phone']])
        @include('exports.~pieces.td', ['caption' => $record['city']['name']])
        @include('exports.~pieces.td', ['caption' => $record['city']['region']['name']])
        @include('exports.~pieces.td', ['caption' => $record['city']['region']['country']['name']])
        @include('exports.~pieces.td', ['caption' => $record['street']])
        @include('exports.~pieces.td', ['caption' => $record['street_number']])
        @include('exports.~pieces.td', ['caption' => $record['postal_code']])
        </tr>
    @endforeach
    </tbody>
</table>