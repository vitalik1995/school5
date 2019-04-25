<?php
/**
 * @author Vitalii Rybak <vitalii.rybak@smile-ukraine.com>
 * @copyright 2019 Smile
 */

require_once "ObserverInterface.php";

class FootballFun implements ObserverInterface
{
    const TEXT = "watch football with";
    private $funName;

    /**
     * FootballFun constructor.
     * @param $funName
     */
    public function __construct($funName)
    {
        $this->funName = $funName;
    }

    /**
     * @param SubjectInterface $subject
     */
    public function update(SubjectInterface $subject)
    {
         echo "{$this->getFunName()} ".self::TEXT." {$subject->getTeamName()} <br>";
    }

    public function getFunName()
    {
        return $this->funName;
    }
}
