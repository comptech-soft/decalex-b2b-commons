<table>
    <thead>
        <tr>
            @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => 'Nr<br/>Crt'])
            @foreach($columns as $i => $column)
                @include('decalex-b2b-commons::exports.~pieces.th', ['caption' => $column['caption']])
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
            <tr>
            @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $i + 1])
            @foreach($columns as $j => $column)
                @include('decalex-b2b-commons::exports.~pieces.td', ['caption' => $record['column-' . $column['id']]])
            @endforeach
            </tr>
        @endforeach
    </tbody>
</table>