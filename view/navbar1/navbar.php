<?php

$navbar = [
    "config" => [
        "navbar-class" => "navbar",
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "om" => [
            "text" => "Om",
            "route" => "about",
        ],
        "redovisningar" => [
            "text" => "Redovisningar",
            "route" => "report",
        ],
        "404" => [
            "text" => "404",
            "route" => "some/route",
        ],
    ]
];


function createNav($nav)
{
    global $app;
    $navHTML = "<nav";
    foreach ($nav["config"] as $config => $configVal) {
        switch ($config) {
            case 'navbar-class':
                $navHTML .= " class='$configVal'";
                break;
        }
    }

    $navHTML .= "><ul>";
    foreach ($nav["items"] as $item) {
        $route     = $app->url->create($item["route"]);
        $text      = $item["text"];
        $current   = $app->request->getCurrentUrl();
        $isCurrent = $current === $route
            ? " class='current'"
            : "";
        $navHTML  .= "<li$isCurrent><a href='$route'>$text</a></li>";
    }

    $navHTML .= "</ul></nav>";
    return $navHTML;
}


?>
<?= createNav($navbar) ?>
</header>
