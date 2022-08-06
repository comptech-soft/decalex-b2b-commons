<table>
    <thead>
        <tr>
            @include('exports.~pieces.th', ['caption' => 'Nr<br/>Crt'])
            @include('exports.~pieces.th', ['caption' => 'ID'])
            @include('exports.~pieces.th', ['caption' => 'Client'])
            @include('exports.~pieces.th', ['caption' => 'Număr contract'])
            @include('exports.~pieces.th', ['caption' => 'Data semnăturii'])
            @include('exports.~pieces.th', ['caption' => 'Data expirării'])
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
        <tr>
            @include('exports.~pieces.td', ['caption' => $i + 1])
            @include('exports.~pieces.td', ['caption' => $record['id']])
            @include('exports.~pieces.td', ['caption' => $record['customer']['name']])
            @include('exports.~pieces.td', ['caption' =>  $record['number']])
            @include('exports.~pieces.td', ['caption' =>  $record['date_from']])
            @include('exports.~pieces.td', ['caption' =>  $record['date_to']])
        </tr>
        @endforeach
    </tbody>
</table>