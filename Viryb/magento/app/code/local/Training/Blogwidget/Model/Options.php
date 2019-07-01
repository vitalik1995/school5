<?php
/**
 * Training Blogwidget source model
 *
 * @category Training
 * @package Training_Blogwidget
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

class Training_Blogwidget_Model_Options {
    /**
     * Provide available options as a value/label array
     *
     * @return array
     */
    public function toOptionArray() {
        return array(
            array('value' => 'print', 'label' => 'Print Button'),
            array('value' => 'email', 'label' => 'Inquiry Email Button'),
        );
    }
}