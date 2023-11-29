<?php

namespace Lack\MailScan\Config;

use PhpImap\Mailbox;

class ImapDriver
{


    public Mailbox $mailbox;
    public function connect(ServerConfig $serverConfig) {
        $this->mailbox = new Mailbox($serverConfig->imap_host, $serverConfig->username, $serverConfig->password, "/tmp", "UTF-8");
    }

}
