<?php

$app->router->add("admin/**", function () use ($app) {
    if (!$app->session->has("admin")) {
        $app->response->redirect($app->url->create("login"));
    }
});

$app->router->add("admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("admin/admin");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("admin/read", function () use ($app) {
    $accounts = "";
    $max = 1;

    // Get incoming from search form.
    $search = $app->request->getGet("search", null);

    if ($search) {
        // Only these values are valid
        $columns = ["name", "level"];
        $orders  = ["asc", "desc"];

        // Get settings from GET or use defaults
        // $orderBy = $app->request->getGet("orderby") ?: "name";
        // $order   = $app->request->getGet("order") ?: "asc";
        $orderBy = $app->request->getGet("orderby", "name");
        $order   = $app->request->getGet("order", "asc");

        // Incoming matches valid value sets
        if (!(in_array($orderBy, $columns) && in_array($order, $orders))) {
            die("Not valid input for sorting.");
        }

        // Get number of hits per page
        $hits = (int)($app->request->getGet("hits", 4));
        if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
            die("Not valid for hits.");
        }

        // Get max number of pages
        $sql = "SELECT COUNT(name) AS max FROM me_users;";
        $max = $app->db->executeFetchAll($sql);
        $max = ceil($max[0]->max / $hits);

        // Get current page
        $page = $app->request->getGet("page", 1);
        if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
            die("Not valid for page.");
        }
        $offset = $hits * ($page - 1);

        $results = $app->db->searchUsers("%$search%", $orderBy, $order, $hits, $offset);

        if (count($results) > 0) {
            $updateUrl = $app->url->create("admin/update");
            $deleteUrl = $app->url->create("admin/delete");
            // Loop through the array and gather the data into search results.
            foreach ($results as $result) {
                $name      = $app->esc($result->name);
                $level     = $app->esc($result->level);
                $accounts .= "<tr>";
                $accounts .= "<td>$name</td>";
                $accounts .= "<td>$level</td>";
                $accounts .= "<td><a href='$updateUrl?updateName=$name'>Uppdatera</a></td>";
                $accounts .= "<td><a href='$deleteUrl?deleteName=$name'>Ta bort</a></td>";
                $accounts .= "</tr>";
            }
        }
    }

    $app->view->add("take1/header", ["title" => "Resultat - Admin"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("admin/read", ["accounts" => $accounts, "search" => $search, "max" => $max]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("admin/create", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Skapa - Admin"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("admin/create");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("admin/handle_new_user", function () use ($app) {
    // Handle incoming POST variables.
    $user_name = isset($_POST["new_name"]) ? htmlentities($_POST["new_name"]) : null;
    $user_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;

    if ($user_name != null && $user_pass != null) {
        // Check if username exists.
        if (!$app->db->exists($user_name)) {
            // Make a hash of the password.
            $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);

            // Add user to database.
            $app->db->addUser($user_name, $crypt_pass);

            header("Refresh:2; ".$app->url->create('admin/create'));
            echo "<p><b>$user_name</b> är registrerad!</p>";
        } else {
            header("Refresh:2; ".$app->url->create('admin/create'));
            echo "Denna användare finns redan! Välj ett annat användarnamn.";
        }
    } else {
        $app->response->redirect($app->url->create("admin/create"));
    }
});

$app->router->add("admin/update", function () use ($app) {
    $user = $app->request->getGet("updateName");
    $results = $app->db->searchUsers($user);
    if ($results) {
        $user = $results[0];
    } else {
        $app->response->redirect($app->url->create("admin"));
    }

    $app->view->add("take1/header", ["title" => "Uppdatera - Admin"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("admin/update", ["user" => $user]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("admin/handle_update", function () use ($app) {
    $user    = $app->request->getPost("name");
    $newName = $app->request->getPost("new_name");
    $newPass = $app->request->getPost("new_pass");

    if ($user) {
        if ($newPass != null) {
            $crypt_pass = password_hash($newPass, PASSWORD_DEFAULT);
            $app->db->changePassword($user, $crypt_pass);
        }
        if ($newName != null && $newName != $user) {
            if (!$app->db->exists($newName)) {
                if ($app->db->isAdmin($user)) {
                    $app->session->set("name", $newName);
                    $app->session->set("admin", $newName);
                }
                $app->db->changeUsername($user, $newName);
            } else {
                header("Refresh:2; ".$app->url->create(htmlentities($_SERVER["HTTP_REFERER"])));
                echo "Username already exists.";
                return;
            }
        }
    }
    $app->response->redirect($app->url->create("admin"));
});

$app->router->add("admin/delete", function () use ($app) {
    $user = $app->request->getGet("deleteName");
    if ($user && $app->db->exists($user) && !$app->db->isAdmin($user)) {
        $app->db->deleteUser($user);

        $app->response->redirect($app->url->create(htmlentities($_SERVER["HTTP_REFERER"])));
    } else {
        $app->response->redirect($app->url->create("admin"));
    }
});
