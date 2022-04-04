<?
$router->addGroup("/swagger", function (FastRoute\RouteCollector $router) {
  $router->addRoute("GET", "/example/{name:.+}", function () {
    $path = __DIR__ . "/../../views/swagger/examples/" . $_ENV['Route']['vars']['name'];
    if (!is_dir($path)) {
      return;
    }
    $openapi = \OpenApi\Generator::scan(["src/views/swagger/examples/" . $_ENV['Route']['vars']['name']]);
    header('Content-Type: application/json');
    echo $openapi->toJson();
  });
  $router->addRoute("GET", "/={name:.+}", function () {
    require_once __DIR__ . "/../../views/swagger/index.php";
  });
});
