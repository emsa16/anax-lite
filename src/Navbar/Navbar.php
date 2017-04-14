<?php
namespace Emsa\Navbar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Navbar implements
    \Anax\Common\ConfigureInterface,
    \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\ConfigureTrait,
        \Anax\Common\AppInjectableTrait;


    /**
     * Get HTML for the navbar.
     *
     * @return string as HTML with the navbar.
     */
    public function getHTML()
    {
        $nav     = $this->config;
        $app     = $this->app;
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
}
