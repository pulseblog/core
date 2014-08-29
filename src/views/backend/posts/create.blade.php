@extends ('pulse::backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>Pulse</li>
        <li>{{ link_to_action('Pulse\Controllers\Backend\PostsController@index', 'Posts') }}</li>
        <li>New Post</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        @include ('pulse::backend.posts._form')
    </div>
@stop
