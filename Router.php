<?php

require_once 'Database.php';

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    public ?Database $database = null;
    public function __construct($database)
    {
        $this->database = $database;
    }
    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }
    public function resolve()
    {
        // echo '<pre>';
        // var_dump($_SERVER);
        // echo '</pre>';
        $method = strtolower($_SERVER['SCRIPT_NAME']);
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        if ($method === 'GET') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        call_user_func($fn, $this);
    }

    public function renderView($view)
    {
        ob_start();
        include __DIR__ . "/view/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/view/_layout.php";
    }
}
