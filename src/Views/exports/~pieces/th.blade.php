<th @isset($rowspan) rowspan="{{$rowspan}}" @endisset @isset($colspan) colspan="{{$colspan}}" @endisset  style="font-weight: bold; text-align:@isset($align){{$align}}@else left @endisset; font-size:@isset($fontSize){{$fontSize}}px @else 12px @endisset; background-color:@isset($bkCol){{$bkCol}} @else #E3E3E3 @endisset; color:@isset($col){{$col}} @else #000000 @endisset; border:1px solid #000000">
    {!! $caption !!}
</th>