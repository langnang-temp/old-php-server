<?
$router->addGroup("/swagger", function (FastRoute\RouteCollector $router) {
  $router->addRoute("GET", "/example/{name:.+}", function () {
    $path = __DIR__ . "/../../views/swagger/examples/" . $_ENV['Route']['vars']['name'];
    if (!is_dir($path)) {
      return;
    }
    $openapi = \OpenApi\Generator::scan(["src/views/swagger/examples/" . $_ENV['Route']['vars']['name']]);
    echo $openapi->toJson();
  });
});
