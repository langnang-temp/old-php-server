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
  $router->addRoute("GET", "", function () {
    $openapi = \OpenApi\Generator::scan(["src/api/"]);
    echo $openapi->toJson();
  });

  require_once __DIR__ . "/modules/sql.php";
});
