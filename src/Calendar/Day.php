<?php
namespace Emsa\Calendar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Day
{
    private $name;
    private $monthDayNr;
    private $weekDayNr;
    private $yearDayNr;
    private $isFirst;
    private $isRed;

    public function __construct($curDay, $curMonth, $curYear)
    {
        // Variables that are extracted from getdate().
        $weekday;
        $mday;
        $wday;
        $yday;

        $tempDate = mktime(0, 0, 0, $curMonth, $curDay, $curYear);
        extract(getdate($tempDate));
        if ($wday === 0) {
            $wday = 7;
        }

        $this->name       = $weekday;
        $this->monthDayNr = $mday;
        $this->weekDayNr  = $wday;
        $this->yearDayNr  = ($yday + 1);
        $this->isFirst    = $wday === 1 ? true : false;
        $this->isRed      = $wday === 7 ? true : false;
    }


    public function getMonthNr()
    {
        return $this->monthDayNr;
    }


    public function getWeekNr()
    {
        return $this->weekDayNr;
    }


    public function firstInWeek()
    {
        return $this->isFirst;
    }


    public function isRedDay()
    {
        return $this->isRed;
    }
}
