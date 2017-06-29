<?php
namespace Emsa\Textfilter;

/**
 * Test cases for class TextFilter.
 */
class TextFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to filter with bbcode2html
     */
    public function testFilterbbcode2html()
    {
        $unfiltered = "[url=http://dbwebb.se]dbwebb[/url]";
        $filtered = '<a href="http://dbwebb.se">dbwebb</a>';

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "bbcode"));
    }


    /**
     * Test case to filter with makeClickable
     */
    public function testFiltermakeClickable()
    {
        $unfiltered = "http://dbwebb.se";
        $filtered = '<a href=\'http://dbwebb.se\'>http://dbwebb.se</a>';

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "link"));
    }


    /**
     * Test case to filter with markdown
     */
    public function testFiltermarkdown()
    {
        $unfiltered = "En text med **fetstil**.";
        $filtered = "<p>En text med <strong>fetstil</strong>.</p>\n";

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "markdown"));
    }


    /**
     * Test case to filter with newline2br
     */
    public function testFilternewline2br()
    {
        $unfiltered = "En rad.\nEn till rad.";
        $filtered = "En rad.<br />\nEn till rad.";

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "nl2br"));
    }


    /**
     * Test case to filter with strip
     */
    public function testFilterstrip()
    {
        $unfiltered = "<script>alert('Got ya!');</script>";
        $filtered = "alert('Got ya!');";

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "strip"));
    }


    /**
     * Test case to filter with esc
     */
    public function testFilteresc()
    {
        $unfiltered = "<a href='test'>Åsö</a>";
        $filtered = "&lt;a href='test'&gt;Åsö&lt;/a&gt;";

        $textfilter = new TextFilter();
        $this->assertEquals($filtered, $textfilter->format($unfiltered, "esc"));
    }
}
