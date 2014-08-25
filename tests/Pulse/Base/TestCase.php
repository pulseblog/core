<?php namespace Pulse\Base;

use PHPUnit_Framework_TestCase;
use Illuminate\Container\Container;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Setup for tests
     */
    public function setUp()
    {
        $this->prepareApplication();
    }

    /**
     * Creates a new IoC container instance
     *
     * @return Illuminate\Container\Container
     */
    protected function prepareApplication()
    {
        global $app;

        $app = new Container;

        return $app;
    }

    /**
     * Actually runs a protected method of the given object.
     * @param       $obj
     * @param       $method
     * @param array $args
     * @return mixed
     */
    protected function callProtected($obj, $method, $args = array())
    {
        $methodObj = new ReflectionMethod(get_class($obj), $method);
        $methodObj->setAccessible(true);

        if (is_object($args)) {
            $args = [$args];
        } else {
            $args = (array) $args;
        }

        return $methodObj->invokeArgs($obj, $args);
    }
}
