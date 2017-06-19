<?php
/**
 * Routes for webshop and webshop backend pages.
 */

$app->router->add("shop/admin/**", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->redirect("login");
    }
});

$app->router->add("shop/admin", function () use ($app) {
    $resultset = $app->webshop->getProducts($app);

    $app->view->add("take1/header", ["title" => "Webshop backend"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("shop/admin/admin", ["resultset" => $resultset]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("shop/admin/reset", function () use ($app) {
    $file   = "../sql/setup-webshop.sql";
    $output = $app->db->resetTable($file);

    $app->view->add("take1/header", ["title" => "Återställ databasinnehåll"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("shop/admin/reset", ["output" => $output]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("shop/admin/edit", function () use ($app) {
    $productId = $app->getPost("productId") ?: $app->request->getGet("id");
    if (!is_numeric($productId)) {
        die("Not valid for product id.");
    }

    if ($app->hasKeyPost("doDelete")) {
        $app->redirect("shop/admin/delete", "?id=$productId");
    } elseif ($app->hasKeyPost("doSave")) {
        $params = $app->getPost([
            "productId",
            "productTitle",
            "productImage",
            "productPrice",
            "productCategory",
            "productInventory"
        ]);

        // In case I implement multiple select categories
        // $params["productCategory"] = implode(",", $params["productCategory"]);

        $app->webshop->update($app, $params);
        $app->redirect("shop/admin/edit", "?id=$productId");
    }

    $product = $app->webshop->getProduct($app, $productId);
    $categories = $app->webshop->getCategories($app);

    $app->view->add("take1/header", ["title" => "Redigera produkt"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("shop/admin/edit", ["product" => $product, "categories" => $categories]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("shop/admin/create", function () use ($app) {
    if ($app->hasKeyPost("doCreate")) {
        $params = $app->getPost([
            "productTitle",
            "productImage",
            "productPrice",
            "productCategory",
            "productInventory"
        ]);

        $app->webshop->create($app, $params);
        $app->redirect("shop/admin/");
    }

    $categories = $app->webshop->getCategories($app);

    $app->view->add("take1/header", ["title" => "Lägg till produkt"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("shop/admin/create", ["categories" => $categories]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});

$app->router->add("shop/admin/delete", function () use ($app) {
    $productId = $app->getPost("productId") ?: $app->request->getGet("id");
    if (!is_numeric($productId)) {
        die("Not valid for product id.");
    }

    if ($app->hasKeyPost("doDelete")) {
        $app->webshop->delete($app, $productId);
        $app->redirect("shop/admin");
    }

    $product = $app->webshop->getProduct($app, $productId);

    $app->view->add("take1/header", ["title" => "Radera produkt"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("shop/admin/delete", ["product" => $product]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                   ->send();
});
