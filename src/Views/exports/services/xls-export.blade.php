<table>
    <thead>
        <tr>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Nr<br/>Crt</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">ID</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Order No</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Name</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Type</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tarif (EUR)</th>
            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tarif ore<br/>suplimentare (EUR)</th>
            <th colspan="4" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tipuri abonamente</th>

            <th rowspan="2" style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Numar ore<br/>incluse</th>
        </tr>

        <tr>
           
            <th style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tip</th>
            <th style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tarif (EUR)</th>
            <th style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Tarif ore<br/>suplimentare (EUR)</th>
            <th style="font-weight:bold; text-align: center;  font-size:14px; background-color: #E3E3E3; color:#000000; border:1px solid #000000">Numar ore<br/>incluse</th>

            
        </tr>
    </thead>

    <tbody>
        @foreach($records as $i => $record)
            @if(count($record['abonamente']) == 0)
                <tr>
                    <td style="border:1px solid #000000">{{$i + 1}}</td>
                    <td style="border:1px solid #000000">{{ $record['id']}}</td>
                    <td style="border:1px solid #000000">{{ $record['order_no']}}</td>
                    <td style="border:1px solid #000000">{{ $record['name']}}</td>
                    <td style="border:1px solid #000000">{{ $record['type']}}</td>
                    <td style="border:1px solid #000000; text-align: right">{{ $record['tarif']}}</td>
                    <td style="border:1px solid #000000; text-align: right">{{ $record['tarif_ore_suplimentare']}}</td>
                    <td colspan="4" style="border:1px solid #000000; text-align: center">-</td>
                    <td style="border:1px solid #000000; text-align: right">{{ $record['ore_incluse_abonament']}}</td>
                </tr>
            @else
                @foreach($record['abonamente'] as $j => $abonament)
                    @if($j == 0)
                        <tr>
                            <td style="border:1px solid #000000">{{$i + 1}}</td>
                            <td style="border:1px solid #000000">{{ $record['id']}}</td>
                            <td style="border:1px solid #000000">{{ $record['order_no']}}</td>
                            <td style="border:1px solid #000000">{{ $record['name']}}</td>
                            <td style="border:1px solid #000000">{{ $record['type']}}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ $record['tarif']}}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ $record['tarif_ore_suplimentare']}}</td>
                            
                            <td style="border:1px solid #000000">{{ array_key_exists('name', $abonament) ? $abonament['name'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('tarif', $abonament) ? $abonament['tarif'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('tarif_ore_suplimentare', $abonament) ? $abonament['tarif_ore_suplimentare'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('numar_ore_incluse', $abonament) ? $abonament['numar_ore_incluse'] : '-' }}</td>

                            <td style="border:1px solid #000000; text-align: right">{{ $record['ore_incluse_abonament']}}</td>
                        </tr>
                    @else
                        <tr>
                            <td style="border:1px solid #000000">&nbsp;</td>
                            <td style="border:1px solid #000000">&nbsp;</td>
                            <td style="border:1px solid #000000">&nbsp;</td>
                            <td style="border:1px solid #000000">&nbsp;</td>
                            <td style="border:1px solid #000000">&nbsp;</td>
                            <td style="border:1px solid #000000; text-align: right">&nbsp;</td>
                            <td style="border:1px solid #000000; text-align: right">&nbsp;</td>
                            
                            <td style="border:1px solid #000000;">{{ array_key_exists('name', $abonament) ? $abonament['name'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('tarif', $abonament) ? $abonament['tarif'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('tarif_ore_suplimentare', $abonament) ? $abonament['tarif_ore_suplimentare'] : '-' }}</td>
                            <td style="border:1px solid #000000; text-align: right">{{ array_key_exists('numar_ore_incluse', $abonament) ? $abonament['numar_ore_incluse'] : '-'}}</td>

                            <td style="border:1px solid #000000; text-align: right">&nbsp;</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>