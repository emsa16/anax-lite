<?php
namespace Emsa\Calendar;

/**
 * Calendar class. Interface for the view access to the calendar.
 */
class Calendar
{
    private $min   = 2012;
    private $max   = 2022;
    private $years = [];


    public function __construct()
    {
        for ($year = $this->min; $year <= $this->max; $year++) {
            $this->years[$year] = new Year($year);
        }
    }


    // Returns month as HTML table calendar.
    public function getMonthCal($year, $month, $assetCreator, $method)
    {
        $year      = $this->years[$year];
        $month     = $year->getMonth($month);
        $yearNr    = $year->getNr();
        $monthName = $month->getName();
        $monthImg  = $assetCreator->$method($month->getImg());

        $html = "<h2 class='center'>$monthName $yearNr</h2>
                <table class='calendar'>
                    <tfoot><tr><td colspan='7'>
                        <img src='$monthImg' class='cal-img' alt='$monthName landscape image' />
                    </td></tr></tfoot>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th class='red-day'>Sunday</th>
                    </tr>
                    <tr>";

        $days = $month->getDays();
        foreach ($days as $day) {
            $dayNr     = $day->getMonthNr();
            $weekDayNr = $day->getWeekNr();

            if ($dayNr === 1) {
                // Adding empty cells at beginning of calendar month.
                list($prevYearNr, $prevMonthNr) = $this->getOtherMonth($yearNr, $month->getNr(), -1);
                $prevYear   = $this->years[$prevYearNr];
                $prevMonth  = $prevYear->getMonth($prevMonthNr);
                $prevDays   = $prevMonth->getDays();
                $daysBefore = array_slice($prevDays, -($weekDayNr - 1), ($weekDayNr - 1));
                foreach ($daysBefore as $dayBefore) {
                    $dayBeforeNr = $dayBefore->getMonthNr();
                    $html       .= "<td class='shadow-day'>$dayBeforeNr</td>";
                }
            } else if ($day->firstInWeek()) {
                // Ending previous row and starting new, if not first day of month.
                $html .= "</tr><tr>";
            }

            $dayClass = $day->isRedDay() ? "class='red-day'" : "";
            $html    .= "<td $dayClass>$dayNr</td>";

            // Adding empty cells at end of calendar month.
            if ($dayNr === $month->nrDaysInMonth()) {
                list($nextYearNr, $nextMonthNr) = $this->getOtherMonth($yearNr, $month->getNr(), +1);
                $nextYear  = $this->years[$nextYearNr];
                $nextMonth = $nextYear->getMonth($nextMonthNr);
                $nextDays  = $nextMonth->getDays();
                $daysAfter = array_slice($nextDays, 0, (7 - $weekDayNr));
                foreach ($daysAfter as $dayAfter) {
                    $dayAfterNr    = $dayAfter->getMonthNr();
                    $dayAfterClass = $dayAfter->isRedDay() ? "red-day" : "";
                    $html         .= "<td class='shadow-day $dayAfterClass' >$dayAfterNr</td>";
                }
            }
        }

        $html .= "</tr></table>";
        return $html;
    }


    public function getOtherMonth($year, $month, $direction)
    {
        $otherMonth = ($month + $direction);
        $otherYear  = $year;
        if ($otherMonth === 0) {
            $otherMonth = 12;
            $otherYear  = ($otherYear + $direction);
        } else if ($otherMonth === 13) {
            $otherMonth = 1;
            $otherYear  = ($otherYear + $direction);
        }

        if ($otherYear < $this->min || $otherYear > $this->max) {
            $otherYear  = $year;
            $otherMonth = $month;
        }

        return array($otherYear, $otherMonth);
    }


    public function getPrevious($year, $month)
    {
        return $this->getOtherMonth($year, $month, -1);
    }


    public function getNext($year, $month)
    {
        return $this->getOtherMonth($year, $month, +1);
    }
}
