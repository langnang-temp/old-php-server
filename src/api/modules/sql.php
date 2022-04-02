<?

$router->addGroup('/sql', function (FastRoute\RouteCollector $router) {
  $router->addRoute("GET", "/connection", function () {
    $conn = \Doctrine\DBAL\DriverManager::getConnection($_ENV['MySQL']);
    return $conn;
  });
});
