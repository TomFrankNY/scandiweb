<?php

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    
    public ?Database $database = null;

    public function __construct(Database $database)
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

    // public function resolve();
    // {

    // }
}