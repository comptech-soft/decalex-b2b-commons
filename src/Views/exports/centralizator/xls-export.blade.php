@php
    function TipColoana($tip) {
        if($tip == 'C') {
            return 'Text scurt';
        }
        if($tip == 'I') {
            return 'Numar';
        }
        if($tip == 'E') {
            return 'Text lung';
        }
        if($tip == 'D') {
            return 'Data';
        }
        if($tip == 'T') {
            return 'Data si ora';
        }
        if($tip == 'O') {
            return 'Optiuni';
        }
        return $tip;
    }
@endphp

<table>
    <thead>
        <tr style="background-color: yellow">
            <th>Număr coloană</th>
            <th>Text header</th>
            <th>Tip coloană</th>
            <th>Lățime în pixeli</th>
            <th>Opțiuni</th>
        </tr>
    </thead>

    <tbody>
        
            @foreach($records as $i => $record)
            <tr>
                <td>#{{1 + $i}}</td>
                <td>{{$record['caption']}}</td>
                <td>{{ TipColoana($record['type'])}}</td>
                <td>{{$record['width']}}</td>
                <td>{{$record['options']}}</td>
            </tr>
            @endforeach
        
    </tbody>
</table>

<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        border:1px solid #000000;
    }
</style>