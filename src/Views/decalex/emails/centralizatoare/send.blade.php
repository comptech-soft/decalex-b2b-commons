@component('mail::message')

# {{ __('Bună ziua') }} {{$user->full_name}}

{!! __('Găsiți mai jos linkurile chestionarelor aferente trimise către <strong>:customer</strong>', ['customer' => $customer->name]) !!}

@foreach($centralizatoare as $i => $centralizator)

@component('mail::panel')
    ## {{ $centralizator->name}} - {{$centralizator->category->name}}

<p>
    {!! $centralizator->body !!}
</p>

<p>
    {!! $centralizator->description !!}
</p>

@component('mail::button', ['url' => config('app.b2b_url') . '/centralizator/raspunde/' . $centralizator->id ])
{{ __('Vezi centralizatorul') }}
@endcomponent

@endcomponent

@endforeach

<p>
{{ __('Vă mulțumim') }},<br>
{{ config('app.name') }}
</p>

@endcomponent