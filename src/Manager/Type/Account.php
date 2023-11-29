<?php

namespace Lack\MailScan\Manager\Type;

class Account
{

    public $subscription_id;

    public $name;

    public $lastImapUid = 0;


    /**
     * @var AccountThreadListItem[]
     */
    public $threads = [];





}
