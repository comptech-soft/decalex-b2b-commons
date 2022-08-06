@component('mail::message')

# {{ __('Bună ziua') }} {{$user->full_name}}

{!! __('Găsiți mai jos linkurile chestionarelor aferente trimise către <strong>:customer</strong>', ['customer' => $customer->name]) !!}

@foreach($chestionare as $i => $chestionar)

@component('mail::panel')
    ## {{ $chestionar->name}} - {{$chestionar->category->name}}

<p>
    {!! $chestionar->body !!}
</p>

<p>
    {!! $chestionar->description !!}
</p>

@component('mail::button', ['url' => config('app.b2b_url') . '/chestionar/raspunde/' . $chestionar->id ])
{{ __('Vezi chestionarul') }}
@endcomponent

@endcomponent

@endforeach

<p>
{{ __('Vă mulțumim') }},<br>
{{ config('app.name') }}
</p>

@endcomponent