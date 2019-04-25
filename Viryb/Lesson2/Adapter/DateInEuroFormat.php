<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "DisplayingDateInEuropeanFormat.php";

class DateInEuroFormat implements DisplayingDateInEuropeanFormat
{
    /**
     * @return false|string
     */
    public function displayDateEuro()
    {
        return date("d-m-Y");
    }
}
