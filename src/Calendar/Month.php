<?php
namespace Emsa\Calendar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Month
{
    private $name;
    private $number;
    private $urlImg;
    private $days = [];


    public function __construct($curMonth, $curYear)
    {
        // Variables that are extracted from getdate().
        $month;
        $mon;
        $year;

        $tempDate = mktime(0, 0, 0, $curMonth, 1, $curYear);
        extract(getdate($tempDate));
        $this->name   = $month;
        $this->number = $mon;
        $this->urlImg = "img/{$this->name}.jpg";
        $daysInMonth  = cal_days_in_month(CAL_GREGORIAN, $mon, $year);
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $this->days[$day] = new Day($day, $mon, $year);
        }
    }


    public function getName()
    {
        return $this->name;
    }


    public function getNr()
    {
        return $this->number;
    }


    public function getImg()
    {
        return $this->urlImg;
    }


    public function getDays()
    {
        return $this->days;
    }


    public function nrDaysInMonth()
    {
        return count($this->days);
    }
}
