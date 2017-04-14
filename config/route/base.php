<?php
/**
 * Routes.
 */

$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Hem"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("take1/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Om"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("take1/about");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Redovisningar"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("take1/report");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("view/test1", function () use ($app) {
    $app->view->add("view/test1", [
        "title" => "Home",
        "message" => "Hello World",
        "answer" => 42
    ]);

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("view/test2", function () use ($app) {
    $app->view->add("view/test2", [
        "title" => "Home",
        "message" => "Hello World",
        "answer" => 42
    ]);

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("view/test3", function () use ($app) {
    $app->view->add("view/test3", [
        "title" => "Home",
        "message" => "Hello World",
        "answer" => 42,
        "copyright" => "Emil Sandberg"
    ]);

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("view/test4", function () use ($app) {
    // Create default data set to send to the layout
    $data = [
        "title" => "Index",
        "message" => "Hello World"
    ];

    // Add the layout view to its own region
    $app->view->add("view/layout", $data, "layout");

    // Add views to a specific region
    $app->view->add("view/block", ["region" => "flash1"], "flash", 0);
    $app->view->add("view/block", ["region" => "flash2"], "flash", 1);
    $app->view->add("view/block", ["region" => "main1"], "main", 1);
    $app->view->add("view/block", ["region" => "main2"], "main", 0);
    $app->view->add("view/block", ["region" => "footer1"], "footer", 0);
    $app->view->add("view/block", ["region" => "footer2"], "footer", 1);

    // Render the layout view and send the response
    $body = $app->view->renderBuffered("layout");
    $app->response->setBody($body)
                  ->send();
});

$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});
