<table>
    <thead>
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Nr<br/>Crt'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'ID'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Client'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Număr contract'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data semnăturii'])
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Data expirării'])
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['id']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['customer']['name']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' =>  $record['number']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' =>  $record['date_from']])
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' =>  $record['date_to']])
        </tr>
        @endforeach
    </tbody>
</table>