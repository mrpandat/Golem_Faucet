<?php


namespace GOLEM\GolemFaucetBundle\Service;

class Utils
{
    //const REWARDS = array(0.00013, 0.00020, 0.0005, 0.001);

    //const REWARDS_CHANCE = array(40, 70, 95, 100);

    protected $_em;
    protected $_logger;

    public function __construct($em, $logger)
    {
        $this->_em = $em;
        $this->_logger = $logger;
    }

    /**
     * @return int|mixed
     */
    public function getReward()
    {
        /*$chance = rand(0, 100);
        if ($chance <= self::REWARDS_CHANCE[0]) {
            return self::REWARDS[0];
        } elseif ($chance <= self::REWARDS_CHANCE[1]) {
            return self::REWARDS[1];
        } elseif ($chance <= self::REWARDS_CHANCE[2]) {
            return self::REWARDS[2];
        } elseif ($chance <= self::REWARDS_CHANCE[3]) {
            return self::REWARDS[3];
        } else {
            $this->_logger->error('Get reward error');
            return 0;
        }*/
    }

    protected function _makeRequest($url)
    {
        try {
            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_POST => false,
                CURLOPT_HTTPHEADER => array(
                    'Content-type: application/json'
                )
            );
            $curl = curl_init();
            curl_setopt_array($curl, $options);
            $return = curl_exec($curl);
            curl_close($curl);
            $result =  json_decode($return, true);

            return $result;
        } catch (\Exception $e) {
            $this->_logger->error($e->getMessage());
            return array();
        }
    }
}