<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "DisplayingDateInAmericanFormat.php";

class DateInAmericanFormat implements DisplayingDateInAmericanFormat
{

    /**
     * @return false|string
     */
    public function displayDateAmerican()
    {
        return date("m-d-Y");
    }
}
