<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class EuroAdapterClass implements DisplayingDateInAmericanFormat
{
    private $date;

    /**
     * EuroAdapterClass constructor.
     *
     * @param DisplayingDateInEuropeanFormat $date
     */
    public function __construct(DisplayingDateInEuropeanFormat $date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function displayDateAmerican()
    {
        return $this->date->displayDateEuro();

    }
}
