<?php
/**
 * Login routes.
 */

$app->router->add("login", function () use ($app) {
    // Make sure no one is logged in.
    if ($app->session->has("name")) {
        $name = $app->session->get('name');
        header("Refresh:2; ".$app->url->create('profile'));
        echo "<p>Du är redan inloggad som <b>$name</b></p>
        <p>Omdirigerar dig till din profilsida...</p>";
        return;
    }

    $app->cookie->set("lastLoginTime", time());

    $app->view->add("take1/header", ["title" => "Logga in"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("login/login");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("validate", function () use ($app) {
    $loginUrl = $app->url->create('login');

    // Handle incoming POST variables.
    $user_name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
    $user_pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;

    // Correspond according to input.
    // Check if both fields are filled.
    if ($user_name != null && $user_pass != null) {
        // Check if username exists.
        if ($app->db->exists($user_name)) {
            $get_hash = $app->db->getHash($user_name);
            // Verify user password.
            if (password_verify($user_pass, $get_hash)) {
                $app->session->set("name", $user_name);
                $app->response->redirect($app->url->create("profile"));
            } else {
                // Redirect to login.
                echo "Användarnamn eller lösenord är inkorrekt. <a href='$loginUrl'>Försök på nytt.</a>";
            }
        } else {
            // Redirect to login.
            echo "Det finns ingen sådan användare. <a href='$loginUrl'>Försök på nytt.</a>";
        }
    } else {
        $app->response->redirect($app->url->create("login"));
    }
});

$app->router->add("register", function () use ($app) {
    // Make sure no one is logged in.
    if ($app->session->has("name")) {
        $name = $app->session->get('name');
        header("Refresh:2; ".$app->url->create('profile'));
        echo "<p>Du är redan inloggad som <b>$name</b></p>
        <p>Omdirigerar dig till din profilsida...</p>";
        return;
    }

    $app->view->add("take1/header", ["title" => "Registrera"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("login/create_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("handle_new_user", function () use ($app) {
    $loginUrl = $app->url->create('login');

    // Handle incoming POST variables.
    $user_name = isset($_POST["new_name"]) ? htmlentities($_POST["new_name"]) : null;
    $user_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
    $re_user_pass = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

    if ($user_name !== null && $user_pass !== null && $re_user_pass !== null) {
        // Check if username exists.
        if (!$app->db->exists($user_name)) {
            // Check passwords match.
            if ($user_pass !== $re_user_pass) {
                echo "Lösenorden matchar ej!";
                header("Refresh:2; ".$app->url->create('register'));
            } else {
                // Make a hash of the password.
                $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);

                // Add user to database.
                $app->db->addUser($user_name, $crypt_pass);

                echo "<p><b>$user_name</b> är registrerad!</p><p><a href='$loginUrl'>Logga in</a></p>";
            }
        } else {
            echo "Denna användare finns redan! Välj ett annat användarnamn.";
            header("Refresh:2; ".$app->url->create('register'));
        }
    } else {
        $app->response->redirect($app->url->create("register"));
    }
});

$app->router->add("profile", function () use ($app) {
    if (!$app->session->has("name")) {
        $app->response->redirect($app->url->create("login"));
    }

    $name = $app->session->get('name');

    $cookie = $app->cookie->dump();

    $app->view->add("take1/header", ["title" => "Profil"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("login/profile", ["name" => $name, "cookie" => $cookie]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("change_password", function () use ($app) {
    if (!$app->session->has("name")) {
        $app->response->redirect($app->url->create("login"));
    }

    $user = $app->session->get("name");

    // Handle incoming POST variables.
    $old_pass = isset($_POST["old_pass"]) ? htmlentities($_POST["old_pass"]) : null;
    $new_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
    $re_pass  = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

    // Check if all fields are filled.
    if ($old_pass != null && $new_pass != null && $re_pass != null) {
        // Check if old password is correct.
        if (password_verify($old_pass, $app->db->getHash($user))) {
            // Check if new password matches.
            if ($new_pass === $re_pass) {
                    $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                    $app->db->changePassword($user, $crypt_pass);
                    $status = "Lösenordet har ändrats.";
            } else {
                $status = "Lösenorden matchar inte.";
            }
        } else {
            $status = "Det gamla lösenordet är felaktigt.";
        }
    } else {
        $status = "Alla fält måste fyllas i.";
    }

    $app->view->add("take1/header", ["title" => "Byt lösenord"]);
    $app->view->add("navbar2/navbar");
    $app->view->add("login/change_password", ["status" => $status]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("logout", function () use ($app) {
    $loginUrl = $app->url->create("login");

    // Check if someone is logged in
    if ($app->session->has("name")) {
        $app->session->destroy();
    } else {
        echo "<p>Ingen aktiv användare.</p>";
        echo "<p><a href='$loginUrl'>Logga in på nytt.</a></p>";
        die();
    }

    // Check if session is active
    $has_session = session_status() == PHP_SESSION_ACTIVE;

    if (!$has_session) {
        echo "<p>Sessionen existerar inte längre. Du är nu utloggad!</p>";
    }

    echo "<p>Förstört sessionen.</p>";
    echo "<a href='$loginUrl'>Logga in på nytt.</a>";
});
