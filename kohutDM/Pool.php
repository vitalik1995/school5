<?php

namespace school5\kohutDM;

class Pool
{
    /**
     * @var CastleGuard[]
     */
    private $occupiedCastleGuard = [];

    /**
     * @var CastleGuard[]
     */
    private $freeCastleGuard = [];

    /**
     * @return mixed|CastleGuard
     */
    public function getCastleGuard()
    {
        if (count($this->freeCastleGuard) == 0) {
            $castleGuard = new CastleGuard();
        } else {
            $castleGuard = array_pop($this->freeCastleGuard);
        }

        $this->occupiedCastleGuard[spl_object_hash($castleGuard)] = $castleGuard;

        return $castleGuard;
    }

    /**
     * @param CastleGuard $castleGuard
     * @return bool
     */
    public function disposeCastleGuard(CastleGuard $castleGuard)
    {
        $key = spl_object_hash($castleGuard);

        if (isset($this->occupiedCastleGuard[$key])) {
            unset($this->occupiedCastleGuard[$key]);
            $this->freeCastleGuard[$key] = $castleGuard;
            return true;
        }
        return false;
    }

    /**
     * @return int
     */
    public function countCastleGuard()
    {
        return count($this->occupiedCastleGuard) + count($this->freeCastleGuard);
    }

    public function getOccupiedCastleGuard ()
    {
        return $this->occupiedCastleGuard;
    }

    public function getFreeCastleGuard ()
    {
        return $this->freeCastleGuard;
    }

}