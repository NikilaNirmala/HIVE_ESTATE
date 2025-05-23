<?php
class Route
{
    public $requestMethod;
    public $uri;
    public $path;
    public $className;
    public $actionMethod;


    function __construct($requestMethod, $uri, $path, $actionMethod, $className)
    {
        $this->uri = $uri;
        $this->requestMethod = $requestMethod;
        $this->path = $path;
        $this->actionMethod = $actionMethod;
        $this->className = $className;
    }
}
