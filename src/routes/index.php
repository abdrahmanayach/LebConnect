<?php

namespace App\Router;

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;

$router = new Router();

$router->get('/', HomeController::class, 'home');

$router->get('/register', AuthController::class, 'getRegister');
$router->post("/register", AuthController::class, 'postRegister');
$router->get("/login", AuthController::class, 'getLogin');
$router->post("/login", AuthController::class, 'postLogin');
$router->get('/logout', AuthController::class, 'logout');
$router->get('/page ', AuthController::class, 'page');

$router->post('/post', HomeController::class, 'post');
$router->post('/like', HomeController::class, 'like');
$router->post('/comment', HomeController::class, 'comment');
$router->get('/jobs', HomeController::class, 'jobs');
$router->post('/follow', HomeController::class, 'follow');
$router->get('/network', HomeController::class, 'network');
$router->post('/create-job', HomeController::class, 'createJob');



$router->get('/profile', ProfileController::class, 'profile');
$router->post('/info', ProfileController::class, 'info');
$router->post('/profile-image', ProfileController::class, 'image');
$router->post('/education', ProfileController::class, 'education');
$router->post('/experience', ProfileController::class, 'experience');
$router->post('/skills', ProfileController::class, 'skills');


$router->post('/search', HomeController::class, 'search');




$router->dispatch();
