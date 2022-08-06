@php
    $nivel = 0;
@endphp

<table>
    <thead>
        <tr style="background-color: yellow">
            <th>Număr întrebare</th>
            <th>Tip întrebare</th>
            <th>Text întrebare</th>
            <th>Răspunsuri</th>
            <th>Valoare raspuns</th>
            <th>Activeaza</th>
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
            <tr>
                <td>{{1 + $i}}</td>
                <td>{{ $record['intrebare']['tip']['name']}}</td>
                <td>{{ $record['intrebare']['question'] }}</td>
            </tr>

            @foreach($record['intrebare']['raspunsuri'] as $j => $raspuns )
            <tr style="background-color: cyan">
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align:left">{{ $raspuns['answer']}}</td>
                
                <td>{{ $raspuns['is_correct'] == 0 ? 'Fals' : ($raspuns['is_correct'] == 1 ? 'Adevarat' : 'Liber') }}</td>
                <td>{{$record['intrebare']['activate_on_answer_id'] == $raspuns['id'] ? '*' : ''}}</td>
            </tr>
            @endforeach

            @if(count($record['intrebare']['children']) > 0)
                @include('exports.chestionar.intrebare', [
                    'intrebare' => $record['intrebare']['children'][0],
                    'nivel' => $nivel + 1,
                ])
            @endif

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