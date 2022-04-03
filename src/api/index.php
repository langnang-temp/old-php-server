<?php
global $_SQL;
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
$router->addGroup("/api", function (FastRoute\RouteCollector $router) use ($_SQL) {
  $router->addRoute("GET", "", function () {
    $openapi = \OpenApi\Generator::scan(["src/api/"]);
    echo $openapi->toJson();
  });
  $router->addRoute('GET', '/users', function () {
    return $_ENV;
  });
  // {id} must be a number (\d+)
  $router->addRoute('GET', '/user/{id:\d+}',  function () {
    return $_ENV;
  });
  // The /{title} suffix is optional
  $router->addRoute('GET', '/articles/{id:\d+}[/{title}]',  function () {
    return $_ENV;
  });
  // Matches /user/foo/bar as well
  $router->addRoute('GET', '/user/{name:.+}', function () {
    return $_ENV;
  });
  require_once __DIR__ . "/modules/sql.php";
});
