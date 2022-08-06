@php
    $registru = $records['registru']['register'];
    $registruCustomer = $records['registru'];
    $header = $records['header'];
    $column_count = $records['column_count'];
    $rows = $records['rows'];
    $hasDepartamente = $records['hasDepartamente'];
@endphp

<table>
    <thead>
        <tr>
            <th>
                {{ $registru['name'] }}
            </th>
        </tr>
        <tr>
            <th>
                Număr și data:
            </th>
            <th>
                {{ $registruCustomer['number'] }} 
            </th>
            <th>
                {{ \Carbon\Carbon::createFromFormat('Y-m-d',$registruCustomer['date'])->format('d.m.Y') }}
            </th>
        </tr>
        <tr>
            <th>
                Responsabil:
            </th>
            <th>
                {{ $registruCustomer['responsabil_nume'] }}
            </th>
        </tr> 
        <tr>
            <th>
                Funcție:
            </th>
            <th>
                {{ $registruCustomer['responsabil_functie'] }}
            </th>
        </tr>         

        <tr>
            <th></th>
        </tr>

        <tr>
            <th rowspan="2">#</th>

            @if($hasDepartamente)
                <th>Departament</th>
            @endif

            @foreach($header as $i => $column)
                <th 
                    colspan="{{count($column['subcolumns']) > 0 ? count($column['subcolumns']) : 1}}"
                    rowspan="{{count($column['subcolumns']) > 0 ? 1 : 2}}"
                >
                    {{$column['caption']}} 
                </th>
            @endforeach
        </tr>

        <tr>
            @foreach($header as $i => $column)
                @if(count($column['subcolumns']) > 0)
                    @foreach($column['subcolumns'] as $j => $subcolumn)
                    <th>
                        {{$subcolumn['caption']}}
                    </th>
                    @endforeach
                @endif
            @endforeach
        </tr>

    </thead>

    <tbody>
        @foreach($rows as $i => $row)
            <tr>
                <td>{{1 + $i}}</td>
                @foreach($row as $j => $value)
                    <td>{{$value}}</td>
                @endforeach
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