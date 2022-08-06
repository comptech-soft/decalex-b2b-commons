<table>
    <thead>
        <tr>
            @foreach($columns as $i => $column)
                <th style="font-weight:bold; font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">
                    {{$column['caption']}}
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
            <tr>
                @foreach($columns as $j => $column)
                    <td style="border:1px solid #000000">
                        {{ $record[$j] }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>