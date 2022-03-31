<?php

/**
 * @OA\Info(
 *     description="php-server-apis",
 *     version="0.0.1",
 *     title="PHP Server APIs",
 *     @OA\Contact(
 *         email="langnang.chen@outlook.com"
 *     ),
 * )
 */
$router->addGroup("/api", function (FastRoute\RouteCollector $router) {
  // header('Content-Type: application/json');
  $router->addRoute("GET", "", function ($data) {
    $openapi = \OpenApi\Generator::scan(["src/api/"]);
    echo $openapi->toJson();
  });

  // require_once __DIR__."/modules/{}.php";
});
