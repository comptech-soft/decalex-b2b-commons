<tr>
    <td>
    </td>
    <td> {{ $intrebare['tip']['name'] }} </td>
    <td> {{ $intrebare['question'] }} </td>
</tr>

@foreach($intrebare['raspunsuri'] as $j => $raspuns )
<tr style="background-color: cyan">
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:left">{{ $raspuns['answer']}}</td>
    
    <td>{{ $raspuns['is_correct'] == 0 ? 'Fals' : ($raspuns['is_correct'] == 1 ? 'Adevarat' : 'Liber') }}</td>
    <td>{{$intrebare['activate_on_answer_id'] == $raspuns['id'] ? '*' : ''}}</td>
</tr>
@endforeach

@if(count($intrebare['children']) > 0)
    @include('decalex-b2b-commons::exports.chestionar.intrebare', [
        'intrebare' => $intrebare['children'][0],
        'nivel' => $nivel + 1,
    ])
@endif