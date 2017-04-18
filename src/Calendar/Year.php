<?php
namespace Emsa\Calendar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Year
{
    private $number;
    private $months = [];

    public function __construct($year)
    {
        $this->number = $year;
        for ($month = 1; $month <= 12; $month++) {
            $this->months[$month] = new Month($month, $this->number);
        }
    }

    // Returns year number.
    public function getNr()
    {
        return $this->number;
    }


    // Returns month object.
    public function getMonth($month)
    {
        return $this->months[$month];
    }
}
