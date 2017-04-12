<?php
/**
 * Config-file for view container.
 *
 */
return [

    // Paths to look for views, without ending slash.
    "path" => [
        ANAX_APP_PATH . "/view",
        ANAX_INSTALL_PATH . "/view",
    ],

    // File suffix for template files
    //"suffix" => ".tpl.php",
    "suffix" => ".php",

];
