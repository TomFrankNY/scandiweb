<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/Database.php';
require_once __DIR__.'/Router.php';
require_once __DIR__.'/controllers/Controller.php';

$database = Database :: getInstance();
$router = new Router($database);

$router->get('/', [new Controller(), 'gallery']);
$router->post('/', [new Controller(),'gallery']);

$router->post('/add', [new Controller(), 'add']);
$router->get('/add', [new Controller(), 'add']);

$router->post('/gallery', [new Controller(), 'gallery']);
$router->get('/gallery', [new Controller(), 'gallery']);

$router->post('/drop', [new Controller(), 'drop']);
$router->get('/drop', [new Controller(), 'drop']);

$router->resolve();

// Avoid using conditional statements for handling differences in product types. This means you should avoid any if-else and switch-case statements which are used to handle any difference between products.
// Do not keep your JavaScript code within files with HTML markup, move it to a separate file/-s.
// After successful save action, a user should be redirected to the product list page.
// Frontend styling differs from provided wireframes, please adjust elements positioning and make pages match wireframes more or less.
