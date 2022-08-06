@component('mail::message')
# {{ __('Your reset password link') }}

{{ __('Reset your password by clicking') }}

@component('mail::button', ['url' => config('app.url') . '/reset-password/' . $reminder->code ])
{{ __('Reset password') }}
@endcomponent

{{ __('This link will expire in 60 minutes.') }}

<p>
{{ __('Vă mulțumim') }},<br>
{{ config('app.name') }}
</p>

@endcomponent