<?php
namespace Emsa\Textfilter;

class Textfilter
{
    private $callbacks = [
        "bbcode"   => "bbcode2html",
        "link"     => "make_clickable",
        "markdown" => "markdown",
        "nl2br"    => "newline2br",
        "esc"      => "esc",
        "strip"    => "strip",
    ];

    public function format($text, $filters)
    {
        $filters = explode(",", $filters);
        foreach ($filters as $filter) {
            if (isset($this->callbacks[$filter])) {
                $callback = $this->callbacks[$filter];
                $text = call_user_func(array($this, $callback), $text);
            }
        }
        return $text;
    }

    /**
    * Helper, BBCode formatting converting to HTML.
    *
    * @param string text The text to be converted.
    * @returns string the formatted text.
    */
    private function bbcode2html($text) {
        $search = array(
            '/\[b\](.*?)\[\/b\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[img\](https?.*?)\[\/img\]/is',
            '/\[url\](https?.*?)\[\/url\]/is',
            '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
            );
        $replace = array(
            '<strong>$1</strong>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img src="$1" />',
            '<a href="$1">$1</a>',
            '<a href="$1">$2</a>'
            );
        return preg_replace($search, $replace, $text);
    }

    /**
     * Make clickable links from URLs in text.
     *
     * @param string $text the text that should be formatted.
     * @return string with formatted anchors.
     */
    private function make_clickable($text) {
        return preg_replace_callback(
            '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
            create_function(
                '$matches',
                'return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'
            ),
            $text
        );
    }

    /**
     * Helper, Markdown formatting converting to HTML.
     *
     * @param string text The text to be converted.
     *
     * @return string the formatted text.
     */
    private function markdown($text)
    {
        return \Michelf\Markdown::defaultTransform($text);
    }

    private function newline2br($text)
    {
        return nl2br($text);
    }

    private function strip($text)
    {
        return strip_tags($text);
    }

    /**
     * Sanitize value for output in view.
     *
     * @param string $value to sanitize
     *
     * @return string beeing sanitized
     */
    private function esc($value)
    {
        return htmlentities($value);
    }
}
