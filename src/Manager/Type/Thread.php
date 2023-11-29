<?php

namespace Lack\MailScan\Manager\Type;

use Lack\MailScan\Thread\Message;

class Thread
{

    public string $id;

    public string $name;

    public string $subject;

    /**
     * @var string[]
     */
    public array $tags = [];


    /**
     * @var ThreadMessage[]
     */
    public array $messages = [];


    public array $assets = [];


}
