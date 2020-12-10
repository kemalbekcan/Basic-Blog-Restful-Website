<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header("Access-Control-Allow-Origin: *");

$app = new \Slim\App();

// Tüm kurs kayıtlarını getir.
$app->get('/products', function (Request $request, Response $response) {
    
    $db = new Db();

    
    try {
        $db = $db->connect();
        
        $courses = $db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_OBJ);

    
        return $response
            ->withStatus(200)
            ->withHeader("Content-Type", "application/json")
            ->withJson($courses);

        
        


    } catch (PDOException $e) {
        return $response->withJson(
            array(
                "error" => array(
                    "text" => $e->getMessage(),
                    "code" => $e->getCode()
                )
            )
        );
    }







    $db = null;
});


?>