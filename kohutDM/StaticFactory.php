<?php

namespace school5\kohutDM;

final class StaticFactory
{
    const FIGHTUNIT = 'FightUnit';
    const CASTLEGUARD = 'CastleGuard';

    /**
     * @param string $type
     * @return FightUnit or CastleGuard
     */
    public static function factory(string $type)
    {
        switch ($type) {
            case ($type == self::FIGHTUNIT) : return new FightUnit();
                break;
            case ($type == self::CASTLEGUARD) : return new CastleGuard();
                break;
            default : echo "<br/> Wrong type!";
                break;
        }
    }
}