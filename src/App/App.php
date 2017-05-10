<?php
namespace Emsa\App;

/**
 * An App class to wrap the resources of the framework.
 */
class App
{


    /**
     * Sanitize value for output in view.
     *
     * @param string $value to sanitize
     *
     * @return string beeing sanitized
     */
    public function esc($value)
    {
        return htmlentities($value);
    }



    /**
     * Function to create links for sorting and keeping the original querystring.
     *
     * @param string $column the name of the database column to sort by
     * @param string $route  prepend this to the anchor href
     *
     * @return string with links to order by column.
     */
    public function orderby($column, $route)
    {
        $asc  = $this->mergeQueryString(["orderby" => $column, "order" => "asc"], $route);
        $desc = $this->mergeQueryString(["orderby" => $column, "order" => "desc"], $route);

        return <<<EOD
        <span class="orderby">
        <a href="$asc">&darr;</a>
        <a href="$desc">&uarr;</a>
        </span>
EOD;
    }



    /**
     * Use current querystring as base, extract it to an array, merge it
     * with incoming $options and recreate the querystring using the resulting
     * array.
     *
     * @param array  $options to merge into exitins querystring
     * @param string $prepend to the resulting query string
     *
     * @return string as an url with the updated query string.
     */
    public function mergeQueryString($options, $prepend = "?")
    {
        // Parse querystring into array
        $query = [];
        parse_str($_SERVER["QUERY_STRING"], $query);

        // Merge query string with new options
        $query = array_merge($query, $options);

        // Build and return the modified querystring as url
        return $prepend . http_build_query($query);
    }
}
