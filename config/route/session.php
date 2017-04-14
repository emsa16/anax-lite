<?php
/**
 * Session routes.
 */

 $app->router->add("session", function () use ($app) {
     $app->view->add("take1/header", ["title" => "Hem"]);
     $app->view->add("navbar2/navbar");
     $app->view->add("");
     $app->view->add("take1/footer");

     $app->response->setBody([$app->view, "render"])
                   ->send();
 });
