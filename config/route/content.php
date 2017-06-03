<?php
/**
 * Routes for database content pages.
 */

$app->router->add("content", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/reset", function () use ($app) {
    $file   = "../sql/setup-content.sql";
    $output = $app->db->resetTable($file);

    $app->view->add("take1/header", ["title" => "Återställ databasinnehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/reset", ["output" => $output]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/admin", function () use ($app) {
    $resultset = $app->content->getAll($app);

    $app->view->add("take1/header", ["title" => "Admininnehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/admin", ["resultset" => $resultset]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/edit", function () use ($app) {
    $contentId = $app->getPost("contentId") ?: $app->request->getGet("id");
    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
    }

    if ($app->hasKeyPost("doDelete")) {
        $app->redirect("content/delete", "?id=$contentId");
    } elseif ($app->hasKeyPost("doSave")) {
        $params = $app->getPost([
            "contentTitle",
            "contentPath",
            "contentSlug",
            "contentData",
            "contentType",
            "contentFilter",
            "contentPublish",
            "contentId"
        ]);

        if (!$params["contentSlug"]) {
            $params["contentSlug"] = $app->content->slugify($params["contentTitle"]);
        }

        if (!$params["contentPath"]) {
            $params["contentPath"] = null;
        }

        if (!$params["contentPublish"]) {
            $params["contentPublish"] = null;
        }

        $app->content->update($app, $params);
        $app->redirect("content/edit", "?id=$contentId");
    }

    $content = $app->content->getContent($app, $contentId);

    $app->view->add("take1/header", ["title" => "Redigera innehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/edit", ["content" => $content]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/create", function () use ($app) {
    if ($app->hasKeyPost("doCreate")) {
        $title = $app->getPost("contentTitle");
        $app->content->create($app, $title);
        $id = $app->db->lastInsertId();
        $app->redirect("content/edit", "?id=$id");
    }

    $app->view->add("take1/header", ["title" => "Skapa innehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/create");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/delete", function () use ($app) {
    $contentId = $app->getPost("contentId") ?: $app->request->getGet("id");
    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
    }

    if ($app->hasKeyPost("doDelete")) {
        $app->content->delete($app, $contentId);
        $app->redirect("content/admin");
    }

    $content = $app->content->getTitle($app, $contentId);

    $app->view->add("take1/header", ["title" => "Radera innehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/delete", ["content" => $content]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/pages", function () use ($app) {
    $resultset = $app->content->getPages($app);

    $app->view->add("take1/header", ["title" => "Visa sidor"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/pages", ["resultset" => $resultset]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/blog", function () use ($app) {
    $resultset = $app->content->getBlogposts($app);

    $app->view->add("take1/header", ["title" => "Visa blogg"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/blog", ["resultset" => $resultset]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/blog/**", function () use ($app) {
    $slug = basename($app->request->getCurrentUrl());

    if ($slug == "blog") {
        return;
    }

    $content = $app->content->getPost($app, $slug);

    if (!$content) {
        $app->redirect("content/404"); // inte helt nöjd här, skulle vilja skicka med den felaktiga routen
    }

    $content->data = $app->filter->format($content->data, "esc");
    $content->data = $app->filter->format($content->data, $content->filter);

    $app->view->add("take1/header", ["title" => $content->title]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/blogpost", ["content" => $content]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/pages/**", function () use ($app) {
    $path = basename($app->request->getCurrentUrl());

    if ($path == "pages") {
        return;
    }

    $content = $app->content->getPage($app, $path);

    if (!$content) {
        $app->redirect("content/404"); // inte helt nöjd här, skulle vilja skicka med den felaktiga routen
    }

    $content->data = $app->filter->format($content->data, "esc");
    $content->data = $app->filter->format($content->data, $content->filter);

    $app->view->add("take1/header", ["title" => $content->title]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/page", ["content" => $content]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("content/404", function () use ($app) {
    header("HTTP/1.0 404 Not Found");
    $app->view->add("take1/header", ["title" => "404"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("content/404");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});
