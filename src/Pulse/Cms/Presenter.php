<?php namespace Pulse\Cms;

use App, View;

/**
 * Class Presenter
 *
 * The Presenter service has the responsability of rendering the given Page/Post
 * domain object.
 *
 * @package  Pulse\Cms
 */
class Presenter
{
    /**
     * The page to be presented
     * @var Page
     */
    public $instance = null;

    /**
     * Sets the instance that is going to be presented.
     * @param  Page   $instance Page or post to be presented
     * @return void
     */
    public function setInstance(Page $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Displays the page instance
     * @return Illuminate\View\View A view displaying the page
     */
    public function display()
    {
        $mdParser = App::make('Michelf\MarkdownExtra');

        $htmlContent = $mdParser->transform($this->instance->content);

        $viewVars = [
            'page' => $this->instance,
            'htmlContent' => $htmlContent
        ];

        // Due to the polymorphy
        if($this->instance instanceOf Post) {
            return View::make('pulse::front.posts._display', $viewVars);
        } else {
            return View::make('pulse::front.pages._display', $viewVars);
        }
    }
}
