<?php
global $_SQL;

$router->addGroup("/api", function (FastRoute\RouteCollector $router) use ($_SQL) {
  $router->addRoute("GET", "", function () {
    $urls = array_merge(
      [
        "api/sql" => "src/api/modules/sql",
      ],
      array_reduce([
        'misc', 'object', 'openapi-spec', 'petstore-3.0', 'petstore.swagger.io', 'schema-query-parameter-processor', 'swagger-spec/petstore', 'swagger-spec/petstore-simple', 'swagger-spec/petstore-with-external-docs', 'using-interfaces', 'using-refs', 'using-traits'
      ], function ($total, $name) {
        $total["example/{$name}"] = "src/views/swagger/examples/{$name}";
        return $total;
      })
    );
    if (!array_key_exists($_GET['name'], $urls)) {
      $result = [];
      foreach ($urls as $name => $url) {
        array_push($result, ["name" => $name, "url" => "/?/api?name=" . $name,]);
      }
      echo preg_replace("/\\\\/", "", json_encode($result, JSON_UNESCAPED_UNICODE));
    } else {
      $openapi = \OpenApi\Generator::scan([$urls[$_GET['name']]]);
      $openapi = json_decode($openapi->toJson(), true);
      $paths = $openapi['paths'];
      $openapi['paths'] = [];
      foreach ($paths as $path => $value) {
        $openapi['paths']['/?' . $path] = $value;
      }
      echo json_encode($openapi, JSON_UNESCAPED_UNICODE);
    }
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
  require_once __DIR__ . "/modules/sql/index.php";
});
