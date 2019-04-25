<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "SubjectInterface.php";

class FootballTeam implements SubjectInterface
{
    /**
     * @var name of football team
     */
    private $teamName;

    /**
     * @var array
     */
    private $observers = [];

    /**
     * FootballTeam constructor.
     * @param $name
     */
    public function __construct($teamName)
    {
        $this->teamName = $teamName;
    }

    /**
     * @param ObserverInterface $observer
     */
    public function attachObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @param ObserverInterface $observer
     */
    public function detachObserver(ObserverInterface $observer)
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                return;
            }
        }
    }

    /**
     * notify observer object
     */
    public function notify()
    {
        foreach ($this->observers as $observer){
            $observer->update($this);
        }
    }

    public function getTeamName()
    {
        return $this->teamName;
    }
}
