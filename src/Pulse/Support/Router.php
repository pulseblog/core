<?php namespace Pulse\Support;

/**
 * Pulse Router
 *
 * This class will register pulse specific routes
 *
 * @package  Pulse\Support
 */
class Router
{
    /**
     * Register pulse routrs
     *
     * @param  \Illuminate\Routing\Router $router Laravel Router
     *
     * @return boolean Success?
     */
    public function registerRoutes($router)
    {
        /*
        |--------------------------------------------------------------------------
        | Frontend Routes
        |--------------------------------------------------------------------------
        |
        */

        $router->get('/',             'Pulse\Controllers\Frontend\CmsController@indexPosts');
        $router->get('page-{slug}',   'Pulse\Controllers\Frontend\CmsController@showPage');
        $router->get('{slug}',        'Pulse\Controllers\Frontend\CmsController@showPost');

        /*
        |--------------------------------------------------------------------------
        | Backend Routes
        |--------------------------------------------------------------------------
        |
        */

        $router->group([
            'before' => 'auth',
            'prefix' => 'admin',
            'namespace' => 'Pulse\Controllers\Backend'
            ],
            function() use ($router) {
                $router->get(   'pages',          'PagesController@index');
                $router->get(   'page/{id}',      'PagesController@show');
                $router->get(   'page/{id}/edit', 'PagesController@edit');
                $router->get(   'pages/create',   'PagesController@create');
                $router->delete('page/{id}',      'PagesController@destroy');
                $router->put(   'page/{id}',      'PagesController@update');
                $router->post(  'page',           'PagesController@store');

                $router->get(   'posts',          'PostsController@index');
                $router->get(   'post/{id}',      'PostsController@show');
                $router->get(   'post/{id}/edit', 'PostsController@edit');
                $router->get(   'posts/create',   'PostsController@create');
                $router->delete('post/{id}',      'PostsController@destroy');
                $router->put(   'post/{id}',      'PostsController@update');
                $router->post(  'post',           'PostsController@store');
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Confide routes
        |--------------------------------------------------------------------------
        |
        */

        // $router->get( 'users/create',                 'Pulse\Controllers\Backend\UsersController@create');
        // $router->post('users',                        'Pulse\Controllers\Backend\UsersController@store');
        $router->get( 'users/login',                  'Pulse\Controllers\Backend\UsersController@login');
        $router->post('users/login',                  'Pulse\Controllers\Backend\UsersController@do_login');
        $router->get( 'users/confirm/{code}',         'Pulse\Controllers\Backend\UsersController@confirm');
        $router->get( 'users/forgot_password',        'Pulse\Controllers\Backend\UsersController@forgot_password');
        $router->post('users/forgot_password',        'Pulse\Controllers\Backend\UsersController@do_forgot_password');
        $router->get( 'users/reset_password/{token}', 'Pulse\Controllers\Backend\UsersController@reset_password');
        $router->post('users/reset_password',         'Pulse\Controllers\Backend\UsersController@do_reset_password');
        $router->get( 'users/logout',                 'Pulse\Controllers\Backend\UsersController@logout');
    }
}
