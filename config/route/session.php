<?php
/**
 * Session routes.
 */

$app->router->add("session", function () use ($app) {
    $app->session->start();
    $app->view->add("take1/header", ["title" => "Session"]);
    $app->view->add("navbar2/navbar");
    if (!($app->session->has("number"))) {
        $app->session->set("number", 0);
    }
    $number = $app->session->get("number");
    $app->view->add("take1/session", ["number" => $number]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session/increment", function () use ($app) {
    $app->session->start();
    if (!($app->session->has("number"))) {
        $app->session->set("number", 0);
    }
    $number = $app->session->get("number");
    $number++;
    $app->session->set("number", $number);
    $app->response->redirect($app->url->create("session"));
});

$app->router->add("session/decrement", function () use ($app) {
    $app->session->start();
    if (!($app->session->has("number"))) {
        $app->session->set("number", 0);
    }
    $number = $app->session->get("number");
    $number--;
    $app->session->set("number", $number);
    $app->response->redirect($app->url->create("session"));
});

$app->router->add("session/status", function () use ($app) {
    $app->session->start();
    $data = [
        "Session ID" => session_id(),
        "Session name" => session_name(),
        "Session module name" => session_module_name(),
        "Session cache limiter" => session_cache_limiter(),
        "Session cookie parameters" => session_get_cookie_params(),
        "Session module save path" => session_save_path(),
    ];

    $app->response->sendJson($data);
});

$app->router->add("session/dump", function () use ($app) {
    $app->session->start();
    $app->view->add("take1/header", ["title" => "Dump | Session"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("take1/dump", ["dump" => $app->session->dump()]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session/destroy", function () use ($app) {
    $app->session->start();
    $app->session->destroy();
    $app->response->redirect($app->url->create("session/dump"));
});
