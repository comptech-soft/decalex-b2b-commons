<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('~templates.elements.head')

    <body>
        <div id="app">
            <bootstrap 
                :page_payload="{{ json_encode($payload) }}"
            >
            </bootstrap>
        </div>

        @include('~templates.elements.scripts')
    </body>
</html>