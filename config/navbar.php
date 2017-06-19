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
        "kalender" => [
            "text" => "Kalender",
            "route" => "kalender",
        ],
        "content" => [
            "text" => "Content",
            "route" => "content",
        ],
        "filter" => [
            "text" => "Filtertest",
            "route" => "filter",
        ],
        "webshop-backend" => [
            "text" => "Webshop backend",
            "route" => "shop/admin",
        ],
        "404" => [
            "text" => "404",
            "route" => "some/route",
        ],
    ]
];
