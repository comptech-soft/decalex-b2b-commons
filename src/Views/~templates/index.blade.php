<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('decalex-b2b-commons::~templates.elements.head')

    <body>
        <div id="app">
            <bootstrap 
                :page_payload="{{ json_encode($payload) }}"
            >
            </bootstrap>
        </div>

        @include('decalex-b2b-commons::~templates.elements.scripts')
    </body>
</html>