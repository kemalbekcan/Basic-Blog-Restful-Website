<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';
require "../src/config/db.php";


$app = new \Slim\App();



// Courses Routes..
require '../src/routes/courses.php';

$app->run();