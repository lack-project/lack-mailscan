<?php

namespace Lack\MailScan\Manager;

use Phore\ObjectStore\ObjectStore;

class AccountRepo
{


    public function __construct(private ObjectStore $objectStore)
    {
    }


    public function getAccountBySubscriptionId(string $subscription_id) : \App\Config\DudeConfig
    {
        $dudeSubscriptionInfo = new \App\Config\DudeSubscriptionInfo();
        $dudeSubscriptionInfo->auth = ["username" => "dude", "password" => "dude"];
        return new \App\Config\DudeConfig($dudeSubscriptionInfo, $subscription_id);
    }

}
