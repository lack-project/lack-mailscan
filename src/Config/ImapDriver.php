<?php

namespace Lack\MailScan\Config;

use PhpImap\Mailbox;

class ImapDriver
{


    public Mailbox $mailbox;
    public function connect(ImapMailboxConfig $mailboxConfig) {
        $this->mailbox = new Mailbox($mailboxConfig->imap_host, $mailboxConfig->username, $mailboxConfig->password, "/tmp", "UTF-8");
    }

}
