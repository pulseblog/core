<?php namespace Pulse\Controllers;

use Illuminate\Routing\Controller;
use App;

/**
 * BaseController Class
 *
 * Contains the common behavior for Pulse controllers
 *
 * @package Pulse\Controllers
 */
abstract class BaseController extends Controller {

    /**
     * The response manager that is going to be used in order to prepare
     * action responses
     *
     * @var \Pulse\Controllers\ResponseManager
     */
    protected $responseManager = null;

    /**
     * Sets the responseManager attribute of the controller
     */
    public function __construct()
    {
        $this->responseManager = App::make('Pulse\Controllers\ResponseManager');
    }

    /**
     * Make a view using the attached ResponseManager object
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $viewData Data that will be passed to the View only, so it will not be visible in Json responses
     * @return Illuminate\Support\Contracts\RenderableInterface a renderable View or Response object
     */
    protected function render($view, $data = array(), $viewData = array())
    {
        return $this->responseManager->render($view, $data, $viewData);
    }

    /**
     * Create a new redirect response to the given path.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function goToUrl($path, $status = 302, $headers = array(), $secure = null)
    {
        return $this->responseManager->goToUrl($path, $status, $headers, $secure);
    }

    /**
     * Create a new redirect response to a controller action.
     *
     * @param  string  $action
     * @param  array   $parameters
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function goToAction($action, $parameters = array(), $status = 302, $headers = array())
    {
        return $this->responseManager->goToAction($action, $parameters, $status, $headers);
    }
}
