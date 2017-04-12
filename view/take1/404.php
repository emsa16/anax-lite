<?php

$currentRoute = $app->request->getRoute();
$routes = "<ul>";
foreach ($app->router->getAll() as $route) {
    $routes .= "<li>'" . $route->getRule() . "'</li>";
}
$routes .= "</ul>";

$intRoutes = "<ul>";
foreach ($app->router->getInternal() as $route) {
    $intRoutes .= "<li>'" . $route->getRule() . "'</li>";
}
$intRoutes .= "</ul>";

?>
<h1>404 Not Found</h1>
<p>The route '<?= $currentRoute ?>' could not be found!</p>
<h2>Routes loaded</h2>
<p>The following routes are loaded:</p>
<?= $routes ?>
<p>The following internal routes are loaded:</p>
<?= $intRoutes ?>
