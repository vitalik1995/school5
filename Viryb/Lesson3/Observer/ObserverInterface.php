<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

interface ObserverInterface
{
    public function update(SubjectInterface $subject);
}
