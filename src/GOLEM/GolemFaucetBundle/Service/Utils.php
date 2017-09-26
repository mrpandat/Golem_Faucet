<?php


namespace GOLEM\GolemFaucetBundle\Service;

class Utils
{
    const REWARDS = array(0.00013, 0.00020, 0.0005, 0.001);

    const REWARDS_CHANCE = array(40, 70, 95, 100);

    /**
     * @return int|mixed
     */
    public function getReward()
    {
        $chance = rand(0, 100);
        if ($chance <= self::REWARDS_CHANCE[0]) {
            return self::REWARDS[0];
        } elseif ($chance <= self::REWARDS_CHANCE[1]) {
            return self::REWARDS[1];
        } elseif ($chance <= self::REWARDS_CHANCE[2]) {
            return self::REWARDS[2];
        } elseif ($chance <= self::REWARDS_CHANCE[3]) {
            return self::REWARDS[3];
        } else {
            return 0;
        }
    }
}