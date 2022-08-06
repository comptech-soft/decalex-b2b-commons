@component('mail::message')

# {{ __('Bună ziua') }} {{$user->full_name}}

{!! __('Găsiți mai jos linkurile cursuilor aferente trimise către <strong>:customer</strong>', ['customer' => $customer->name]) !!}

@foreach($cursuri as $i => $curs)

@component('mail::panel')
    ## {{ $curs->name}} - {{$curs->category->name}}

<p>
    {!! $curs->descriere !!}
</p>

@component('mail::button', ['url' => config('app.b2b_url') . '/curs/raspunde/' . $curs->id ])
{{ __('Vezi detalii curs') }}
@endcomponent

@endcomponent

@endforeach

<p>
{{ __('Vă mulțumim') }},<br>
{{ config('app.name') }}
</p>

@endcomponent