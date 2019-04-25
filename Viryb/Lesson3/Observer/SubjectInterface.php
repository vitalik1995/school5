<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

interface SubjectInterface
{
    public function attachObserver(ObserverInterface $observer);
    public function detachObserver(ObserverInterface $observer);
    public function notify();
}
