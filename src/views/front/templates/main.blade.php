<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <link rel="canonical" href="{{ Request::url() }}" />
        <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
        <link href="/favicon.ico" type="image/x-icon" rel="icon"/>
        <title>{{ Config::get('pulse.blogname') }}{{ (Config::get('pulse.blogdesc') ? ' - '.Config::get('pulse.blogdesc') : '') }}</title>
        <link href="{{ asset('packages/pulse/core/assets/css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('pulse::front.templates._tag_manager')
        <header class="titlebar">
            <div class="l-block-container">
                @include('pulse::front.templates._menu')
            </div>
        </header>
        <div class="l-block-container">
            @yield('content')
        </div>
        <footer class="l-block-container">
            @include('pulse::front.templates._footer')
        </footer>
    </body>
</html>
