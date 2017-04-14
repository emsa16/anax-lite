<?php
/**
 * Config file for navbar.
 */

return [
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
        "session" => [
            "text" => "Session",
            "route" => "session",
        ],
        "404" => [
            "text" => "404",
            "route" => "some/route",
        ],
    ]
];
