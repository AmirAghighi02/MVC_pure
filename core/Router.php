<?php

namespace core;

class Router
{
    private array $funcs = [];
    private Request $request;
    private Response $response;

    private static ?self $instance = null;

    private function __construct()
    {
        $this->request = Request::getInstance();
        $this->response = Response::getInstance();
    }

    public static function getInstance(): self
    {
        return (self::$instance) ?: self::$instance = new self();
    }

    public function get($uri, $callback): void
    {
        $this->funcs['get'][$uri] = $callback;
    }

    public function post($uri, $callback): void
    {
        $this->funcs['post'][$uri] = $callback;

    }


    public function resolve()
    {
        $uri = $this->request->getURI();
        $method = $this->request->getMethod();
        $callback = @$this->funcs[$method][$uri];
        if (!$callback) return Render::errorRender("Not Found", 404);
        if (is_string($callback)) return Render::renderURI($callback);
        if (is_array($callback)) {
            $controller =new $callback[0];

//            $controller->setAction($callback[1]);
//            $middlewares = $controller->getMiddlewares();

            Application::getInstance()->setCurrentController($controller);
//            foreach ($middlewares as $index => $middleware) {
//                $middleware->execute();
//            }
            $callback[0] = $controller;
            return call_user_func($callback);
        }
    }
}