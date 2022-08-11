<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('vendors/awesome-notifications/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @foreach($styles as $i => $style)
        <link href="{{ $style }}?v={{time()}}" rel="stylesheet">
    @endforeach

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <meta name="locale" content="{{ app()->getLocale() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base-url" content="{{ config('app.url') }}" />
    <meta name="app-name" content="{{ config('app.name') }}" />
    <meta name="platform" content="{{ config('app.platform') }}" />
    <meta name="environment" content="{{ config('app.env') }}" />

    @yield('styles')

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <style>
        body {
            font-family: Roboto,sans-serif;
            line-height: 1.5;
        }
    </style>
</head>