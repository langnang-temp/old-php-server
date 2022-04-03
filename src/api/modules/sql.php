<?

/**
 * @OA\Tag(
 *     name="sql",
 * )
 */
$router->addGroup('/sql', function (FastRoute\RouteCollector $router) {
  /**
   * @OA\Get(
   *     path="/sql/connection",
   *     tags={"sql"},
   *     @OA\Response(response="200", description="An example resource")
   * )
   */
  $router->addRoute("GET", "/connection", function () {
    $conn = \Doctrine\DBAL\DriverManager::getConnection($_ENV['MySQL']);
    return $conn;
  });
});
