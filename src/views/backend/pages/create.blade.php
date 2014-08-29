@extends ('pulse::backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>Pulse</li>
        <li>{{ link_to_action('Pulse\Controllers\Backend\PagesController@index', 'Pages') }}</li>
        <li>New Page</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        @include ('pulse::backend.pages._form')
    </div>
@stop
