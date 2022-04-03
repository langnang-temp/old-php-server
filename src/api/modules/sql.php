<?

/**
 * @OA\Tag(
 *     name="sql",
 * )
 */


$router->addGroup('/sql', function (FastRoute\RouteCollector $router) use ($_SQL) {
  $conn = \Doctrine\DBAL\DriverManager::getConnection($_ENV['MySQL']);
  /**
   * @OA\Get(
   *     path="/api/sql/connection",
   *     tags={"sql"},
   *     summary="链接数据库",
   *     @OA\Response(response="200", description="")
   * )
   */
  $router->addRoute("GET", "/connection", function () use ($conn) {
    return $conn;
  });
  $router->addGroup("/table", function (FastRoute\RouteCollector $router) use ($conn, $_SQL) {
    /**
     * @OA\Get(
     *     path="/api/sql/table/list",
     *     tags={"sql"},
     *     summary="查询数据库中所有表的信息",
     *     @OA\Response(response="200", description="")
     * )
     */
    $router->addRoute("GET", "/list", function () use ($conn, $_SQL) {
      $sql = $_SQL['api']['sql']['select_table_list']($conn);
      $stmt = $conn->prepare($sql);
      $result = $stmt->executeQuery();
      $tables = $result->fetchAllAssociative();
      return $tables;
    });
    /**
     * @OA\Get(
     *     path="/api/sql/table/info",
     *     tags={"sql"},
     *     summary="查询数据库中单个表的信息",
     *     @OA\Parameter(
     *         name="table_name",
     *         in="query",
     *         description="表名",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(response="200", description="")
     * )
     */
    $router->addRoute("GET", "/info", function () use ($conn, $_SQL) {
      $sql = $_SQL['api']['sql']['select_table_info']($conn);
      $stmt = $conn->prepare($sql);
      $result = $stmt->executeQuery();
      $tables = $result->fetchAllAssociative();
      return $tables;
    });
  });
  $router->addGroup("/column", function (FastRoute\RouteCollector $router) use ($conn, $_SQL) {
    /**
     * @OA\Get(
     *     path="/api/sql/column/list",
     *     tags={"sql"},
     *     summary="查询数据库中表的所有字段信息",
     *     @OA\Parameter(
     *         name="table_name",
     *         in="query",
     *         description="表名",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(response="200", description="")
     * )
     */
    $router->addRoute("GET", "/list", function () use ($conn, $_SQL) {
      $sql = $_SQL['api']['sql']['select_column_list']($conn);
      $stmt = $conn->prepare($sql);
      $result = $stmt->executeQuery();
      $tables = $result->fetchAllAssociative();
      return $tables;
    });
    /**
     * @OA\Get(
     *     path="/api/sql/column/info",
     *     tags={"sql"},
     *     summary="查询数据库中表的所有字段信息",
     *     @OA\Parameter(
     *         name="table_name",
     *         in="query",
     *         description="表名",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="column_name",
     *         in="query",
     *         description="列名",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(response="200", description="")
     * )
     */
    $router->addRoute("GET", "/info", function () use ($conn, $_SQL) {
      $sql = $_SQL['api']['sql']['select_column_info']($conn);
      $stmt = $conn->prepare($sql);
      $result = $stmt->executeQuery();
      $tables = $result->fetchAllAssociative();
      return $tables;
    });
  });
});
