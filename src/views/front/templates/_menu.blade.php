<div class="l-block-1">

    @if (Route::currentRouteAction() == 'Front\HomeController@indexPosts')
        <h1 class='logo'>{{ Config::get('pulse.blogname', 'Unamed') }}</h1>
    @else
        <div class='logo h1'>{{ Config::get('pulse.blogname', 'Unamed') }}</div>
    @endif

    <ul class="menu">
        {{ link_to_action('Pulse\Controllers\Frontend\CmsController@indexPosts', 'Blog', [], ['class'=>'link']) }}
        @if (isset($pages))
            @foreach ($pages as $page)
                {{ link_to_action('Pulse\Controllers\Frontend\CmsController@showPage', $page->title, ['slug'=>$page->slug], ['class'=>'link']) }}
            @endforeach
        @endif
    </ul>
</div>
